<?php

$name = "Hymmel";
$description = "I'm a 18 years old developer from Germany.</br>
At work I use C#, VB and SQL but for my hobby projects I use JavaScript, PHP, Java, Lua and C#</br>
In the past, I was a eSport player in Brawlhalla, League of Legends and Wild Rift. Now I'm just a eSport Coach for MWL (Pokemon Unite)";

$tools = [
    [
        "name"=>"LonaDB",
        "img"=>"lona.png",
        "url"=>"https://lona-development.org/"
    ],
    [
        "name"=>"GitHub",
        "img"=>"github.png",
        "url"=>"https://github.com/collin-bchkmr"
    ],
    [
        "name"=>"Discord",
        "img"=>"discord.png",
        "url"=>"https://discord.com/"
    ],
    [
        "name"=>"GeForce NOW",
        "img"=>"geforcenow.png",
        "url"=>"https://geforcenow.com/"
    ],
    [
        "name"=>"Visual Studio Code",
        "img"=>"visualstudiocode.png",
        "url"=>"https://code.visualstudio.com/"
    ]
];

$toolsText = "<ul class=\"tools\">";
foreach($tools as $tool){
    $toolsText = $toolsText . "<li><a href=\"{$tool["url"]}\"><img src=\"assets/img/{$tool["img"]}\"</img></a></li>";
}
$toolsText = $toolsText . "</ul>";

$blogPosts = [
    [ 
        "title" => "Website",
        "date" => "7th Aug. 2024 / 19:33",
        "path" => "website-070824-1933"
    ],
    [ 
        "title" => "Bunny",
        "date" => "5th Aug. 2024 / 18:28",
        "path" => "bunny-050824-1828"
    ],
];

$blogText = "<ul class=\"blog\">";
foreach($blogPosts as $blogPost){
    $blogText = $blogText . "<li><a href=\"blog/{$blogPost["path"]}/\">{$blogPost["title"]}</a><span class=\"blogTime\">{$blogPost["date"]}</span></li>";
}
$blogText = $blogText . "</ul>";

$parts = [
    "title" => "ABC",
    "stylesheet" => "assets/css/style.css",
    "content" => [
        [
            "type" => "html/file",
            "source" => "assets/html/navbar.html"
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
            "text" => "Hi! I'm <b><span class=\"gradient\">" . $name . "!</span></b>"
        ],
        [
            "type" => "text",
            "text" => $description,
            "class" => "smaller"
        ],
        
        [
            "type" => "container",
            "class" => "toolsDiv"
        ],
        [
            "type" => "text",
            "text" => "What do I use?",
            "class" => "toolsText"
        ],
        [
            "type" => "html/text",
            "content" => $toolsText
        ],
        [
            "type" => "containerEnd"
        ],
        [
            "type" => "text",
            "text" => "Blog",
            "class" => "blogHeadline"
        ],
        [
            "type" => "html/text",
            "content" => $blogText
        ],
        [
            "type" => "containerEnd"
        ],
        [
            "type" => "containerEnd"
        ],
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
