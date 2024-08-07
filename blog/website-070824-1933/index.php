<?php

$title = "Website";
$description = "Hey everyone!</br>This is my first Blog Post. I have finished everything regarding the website so far.</br>Hope it doesn't look too bad.";
$date = "7th Aug. 2024 / 19:33";

$parts = [
    "title" => "ABC",
    "stylesheet" => "../../assets/css/style.css",
    "content" => [
        [
            "type" => "html/file",
            "source" => "../../assets/html/navbar.html"
        ],
        [
            "type" => "container",
            "class" => "container"
        ],
        [
            "type" => "container",
            "class" => "headline"
        ],
        [
            "type" => "text",
            "text" => $title . "<span class=\"blogTime\">{$date}</span>"
        ],
        [
            "type" => "text",
            "text" => $description,
            "class" => "smaller"
        ],
        [
            "type" => "containerEnd"
        ],
        [
            "type" => "containerEnd"
        ]
    ]
];
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $p["title"]; ?></title>
        <?php 
        if($parts["stylesheet"] !== "none") echo "<link rel=\"stylesheet\" href=\"{$parts["stylesheet"]}\">";
        ?>
    </head>
    <body>
        <?php
        foreach($parts["content"] as $content){
            switch($content["type"]){
                case "html/file":
                    echo file_get_contents($content["source"]);
                    break;
                case "html/text":
                    echo $content["content"];
                    break;
                case "container":
                    $div = "<div";
                    if($content["class"]) $div = $div . " class=\"" . $content["class"] . "\"";
                    $div = $div . ">";
                    echo $div;
                    break;
                case "containerEnd":
                    echo "</div>";
                    break;
                case "button":
                    $button = "<a";
                    if($content["class"]) $button = $button . " class=\"" . $content["class"] . "\"";
                    $button = $button . " href=\"{$content["url"]}\">{$content["text"]}</a>";
                    echo $button;
                    break;
                case "text":
                    $text = "<p";
                    if($content["class"]) $text = $text . " class=\"" . $content["class"] . "\"";
                    $text = $text . ">{$content["text"]}</p>";
                    echo $text;
                    break;
            }
        }
        ?>
    </body>
</html>