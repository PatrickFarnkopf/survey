<?php

namespace Persistence\Sql;


class SurveyChoiceInfoContext
{
    private $connection;

    public function __construct(\PDO $pdoObject)
    {
        $this->connection = $pdoObject;
    }

    public function get($surveyId)
    {
        $stmt = $this->connection->prepare("SELECT * FROM survey_user_choice WHERE surveyId = :Id");
        $stmt->bindParam(":Id", $surveyId);
        $stmt->execute();
        $data = array();

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            if (!isset($data[$row['itemId']]))
                $data[$row['itemId']] = 0;
            $data[$row['itemId']] += 1;
        }

        $info = new \Model\SurveyChoiceInfo();
        $info->setData($data);
        $info->setSurveyId($surveyId);

        return $info;
    }

    public function submitChoice($surveyId, $itemId)
    {
        $userId = \Application\SessionManager::instance()->currentUser()->getId();
        $stmt = $this->connection->prepare("INSERT INTO survey_user_choice (surveyId, itemId, userId) VALUES (:sId, :iId, uId)");
        $stmt->bindParam(":sId", $surveyId);
        $stmt->bindParam(":iId", $itemId);
        $stmt->bindParam(":uId", $userId);
        $stmt->execute();
    }
}