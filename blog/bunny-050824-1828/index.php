<?php

$title = "Bunny";
$description = "I discovered a Discord (mobile) mod client called Bunny. It's a fork of a deadge mod client called Vendetta.</br>I have looked into some plugins and might get started making some. Bunny supports many things, such as custom plugins (of course), fonts and themes.</br>It even has a pretty big community (in my opinnion).";
$date = "5th Aug. 2024 / 18:28";

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