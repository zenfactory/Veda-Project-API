<?php
    require_once("classes/resources/ContentAutosave.php");
    $discussionAutosave = new ContentAutosave();
    
    switch (strtolower($this->request->getMethod()))
    {
        case "get":
            $this->response->setPayload(json_encode(array($discussionAutosave->checkExistence($this->request->getUri()))));
            $this->response->setContentType("text/xml");
            $this->setStatus(true);
            break;
        case "post": case "put":
            break;
        case "delete":
            break;
    }
?>