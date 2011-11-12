<?php
    Class ResourcePath
    {
        ########################################################
        #### Member Variables     ##############################
        ########################################################
        private $file = null;
        
        ########################################################
        #### Constructor          ##############################
        ########################################################

        # Constructor
        public function __construct($pathString)
        {
            $path = trim($pathString, "/");
            $pathArray = explode("/", $path);
            
            if($pathArray[0]=="data")
            {
                switch(count($pathArray))
                {
                    case 2:
                        switch($pathArray[1])
                        {
                            case "material":
                                $this->file = "fields.php";
                                break;
                            case "nextlessonid":
                                $this->file = "getNextLessonId.php";
                                break;
                            case "nextiloid":
                                $this->file = "getNextIloId.php";
                                break;
                            case "nextcitationid":
                                $this->file = "getNextCitationId.php";
                                break;
                        }
                        break;
                    case 3:
                        if($pathArray[1]=="material")
                        {
                            $this->file = "field.php";
                        }
                        else if($pathArray[1]=="ilo")
                        {
							$this->file = "ilo.php";
                        }
                        else if($pathArray[1]=="citation")
                        {
                            $this->file = "citation.php";
                        }
                        break;
                    case 4:
                        if($pathArray[1]=="material"&&$pathArray[2]=="uploads"&&$pathArray[3]=="image")
                        {
                            $this->file = "image.php";
                        }
                        else if($pathArray[1]=="material")
                        {
                            $this->file = "subject.php";
                        }
                        break;
                    case 5:
                        if($pathArray[1]=="material"&&$pathArray[2]=="uploads"&&$pathArray[3]=="image")
                        {
                            $this->file = "image.php";
                        }
                        else if($pathArray[1]=="material")
                        {
                            $this->file = "course.php";
                        }
                        break;
                    case 6:
                        if($pathArray[1]=="material")
                        {
                            if($pathArray[5]=="exam")
                            {
                                $this->file = "exam.php";
                            }
                            else if($pathArray[5]=="deletedLessons")
                            {
                                $this->file = "deletedLessons.php";
                            }
                            else if($pathArray[5]=="images")
                            {
                                $this->file = "imagesByCourse.php";
                            }
                            else
                            {
                                $this->file = "section.php";
                            }
                        }
                        break;
                    case 7:
                        if($pathArray[1]=="material")
                        {
							if($pathArray[6]=="position")
							{
                            	$this->file = "sectionPosition.php";
							}
							else
							{
								$this->file = "lesson.php";
							}
                        }
						break;
                    case 8:
                        if($pathArray[1]=="material")
                        {
                            if($pathArray[7]=="content")
                            {
                                $this->file = "lesson.php";
                            }
                            else if($pathArray[7]=="ilo")
                            {
                                $this->file = "ilosByLesson.php";
                            }
                            else if($pathArray[7]=="prequiz")
                            {
                                $this->file = "prequiz.php";
                            }
                            else if($pathArray[7]=="quiz")
                            {
                                $this->file = "quiz.php";
                            }
							else if($pathArray[7]=="position")
							{
								$this->file = "lessonPosition.php";
							}
                        }
                        break;
                    case 9:
                        if($pathArray[1]=="material")
                        {
                            if($pathArray[7]=="content"&&$pathArray[8]=="history")
                            {
                                $this->file = "lessonHistory.php";
                            }
                            else if($pathArray[7]=="content"&&$pathArray[8]=="discussion")
                            {
                                $this->file = "discussion.php";
                            }
                        }
                        break;
                    case 10:
                        if($pathArray[1]=="material")
                        {
                            if($pathArray[7]=="content"&&$pathArray[8]=="history")
                            {
                                $this->file = "lessonRevision.php";
                            }
                            else if($pathArray[8]=="discussion"&&$pathArray[9]=="history")
                            {
                                $this->file = "discussionHistory.php";
                            }
                            else if($pathArray[7]=="content"&&$pathArray[8]=="autosave")
                            {
                                $this->file = "lessonAutosave.php";
                            }
                        }
                        break;
                    case 11:
                        if($pathArray[1]=="material")
                        {
                            if($pathArray[8]=="discussion"&&$pathArray[9]=="history")
                            {
                                $this->file = "discussionRevision.php";
                            }
                            else if($pathArray[7]=="content"&&$pathArray[8]=="autosave"&&$pathArray[10]=="exists")
                            {
                                $this->file = "lessonAutosaveExists.php";
                            }
                            else if($pathArray[8]=="discussion"&&$pathArray[9]=="autosave")
                            {
                                $this->file = "discussionAutosave.php";
                            }
                        }
                        break;
                    case 12:
                        if($pathArray[1]=="material")
                        {
                            if($pathArray[8]=="discussion"&&$pathArray[9]=="autosave")
                            {
                                $this->file = "discussionAutosaveExists.php";
                            }
                        }
                }
            }
            else if($pathArray[0]=='user')
            {
                switch(count($pathArray))
                {
                    case 3:
                        if($pathArray[1]!="username"&&$pathArray[2]=="images")
                        {
                            $this->file = "imagesByUsername.php";
                        }
                        else
                        {
                            $this->file = "user.php";
                        }
                        break;
                }
            }
        }
        
        public function getResourceHandler()
        {
            return $this->file;
        }
    }
?>
