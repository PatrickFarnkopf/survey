<?php

namespace Persistence\Sql;

class SurveyContext
{
	private $connection;

	public function __construct(\PDO $pdoObject)
	{
		$this->connection = $pdoObject;
	}

	public function getAll()
	{
        $result = [];
		$stmt = $this->connection->prepare("SELECT * FROM survey");
		$stmt->execute();
		while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
		{
			$survey = new \Model\Survey();
			$survey->setId($row['id']);
			$survey->setName($row['name']);

            $surveyId = $survey->getId();

			$s = $this->connection->prepare("SELECT * FROM survey_item WHERE surveyId = :Id");
			$s->bindParam(':Id', $surveyId);
			$s->execute();

			while ($r = $s->fetch(\PDO::FETCH_ASSOC))
			{
				$item = new \Model\SurveyItem();
				$item->setId($r['id']);
				$item->setSurveyId($survey->getId());
				$item->setText($r['body']);
                $survey->addItem($item);
			}

            $result[] = $survey;
		}

        return $result;
	}

    public function get($id)
    {
        $item = null;
        $stmt = $this->connection->prepare("SELECT * FROM survey WHERE id = :Id");
        $stmt->bindParam(":Id", $id);
        $stmt->execute();
        if ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $item = new \Model\Survey();
            $item->setId($id);
            $item->setName($row['name']);

            $surveyId = $item->getId();

            $s = $this->connection->prepare("SELECT id, surveyId, `body` FROM survey_item WHERE surveyId = :Id");
            $s->bindParam(':Id', $surveyId);
            $s->execute();

            while ($r = $s->fetch(\PDO::FETCH_ASSOC))
            {
                $i = new \Model\SurveyItem();
                $i->setId($r['id']);
                $i->setSurveyId($item->getId());
                $i->setText($r['body']);
                $item->addItem($i);
            }
        }

        return $item;
    }
}

?>
