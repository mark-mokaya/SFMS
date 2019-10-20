<?php
    if(isset($_FILES['receipt'])){
        $file_name = $_FILES['receipt']['name'];
        $file_tmp = $_FILES['receipt']['tmp_name'];
        move_uploaded_file($file_tmp, "images/".$file_name);

        // without image enhancements
        shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "images\\'.$file_name.'" result1');

        // without image enhancements
        shell_exec('"C:\\Program Files\\ImageMagick-7.0.8-Q16\\magick" convert -density 1000 "images\\'.$file_name.'" -depth 8 -strip -background white -alpha off "images\\result.tiff"');

        shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "images\\result.tiff" result2');

        shell_exec('"C:\\Program Files\\ImageMagick-7.0.8-Q16\\magick" convert -density 1000 "images\\'.$file_name.'" -depth 8 -strip -background white -alpha off "images\\result.tiff"');

        -threshold xx%

        shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "images\\result2.tiff" result3');

        //finding total
        /* 
        split into words

        loop through and find words with "." and chars surrounding

        loop through and eliminate those with more than one "."
        
        if letters/symbols loop through and convert as below
        O/D 0
        I/L 1
        Z/e 2
        E   3
        A/h 4
        S   5
        G/b 6
        T/j 7
        B/X 8
        J/g 9

        else if character not found remove character

        if many numbers, show all results, ask user if correct

        else ask user to enter total
        
        */
    } 


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
        <p>Upload Success <a href="index.php">< Go Back</a>
        <p><?php echo "<img src=images/".$file_name." width=500><br>";?>
</div>
<div>
    <h1>Result 1: Without Image Enhancements</h1>
    <pre>
        <?php 
            $myfile = fopen("result1.txt", "r") or die("unable to read file");
            echo fread($myfile, filesize("result1.txt"));
            fclose($myfile);
        
        ?>
    </pre>
</div>
<div>
    <h1>Result 2: With Image Enhancements</h1>
    <pre>
        <?php 
            $myfile = fopen("result2.txt", "r") or die("unable to read file");
            echo fread($myfile, filesize("result2.txt"));
            fclose($myfile);
        ?>
    </pre>
</div>
<div>
    <h1>Result 3: Binary image With Image Enhancements</h1>
    <pre>
        <?php 
            $myfile = fopen("result3.txt", "r") or die("unable to read file");
            echo fread($myfile, filesize("result3.txt"));
            fclose($myfile);
        ?>
    </pre>
</div>
    
</body>
</html>