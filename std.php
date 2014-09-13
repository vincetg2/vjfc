<?php
    // Redirects to symlinked script
    if(isset($_SERVER['SCRIPT_NAME']) &&
       strpos($_SERVER['SCRIPT_NAME'], 'how') === false)
    {
        header('Location: how-many-people-have-you-given-stds-to?-LOTS-like-a-hundred');
        exit;
    }
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="kewords"     content="wedding, wedding website, vincent garcia, jacklin sammis, save the date" />
        <meta name="description" content="Vincent Garcia and Jacklin Sammis' wedding website" />
        <meta name="author"      content="Vincent Garcia" />
        
        <meta name="viewport" content="width=640, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <title>Save The Date! - Vincent &amp; Jacklin's Wedding</title>
        
        <style>
            @font-face { font-family: theanoDidot; src: url('fonts/TheanoDidot-Regular.ttf'); }
            @font-face { font-family: monsieurLaDoulaise; src: url('fonts/MonsieurLaDoulaise-Regular.ttf'); }
            
            body { background-color: #f1f0eb; }
            
            #img
            {
                margin: 0 auto;
                text-align: center;
                width: 500px; height: 500px;
                background-image: url('images/sutro.jpg');
                font-family: "Times New Roman", serif; font-weight: 100;
                color: rgb(255, 255, 255);
                box-shadow: 1px 1px 8px #777777;
            }
            
            .nice_block_font { font-family: theanoDidot, "Times New Roman", serif; font-weight: 100; font-size: 0.95em; }
            
            .post_letter_spacing { letter-spacing: 35px; }
            .bigtext { font-size: 70px; line-height: 90px; }
            .uppercase { text-transform: uppercase; }
            .cursive { font-family: monsieurLaDoulaise, theanoDidot, "Times New Roman", serif; }
            .cursive .post_letter_spacing { letter-spacing: 15px; }
            
            .littleline { line-height: 1em; }
            .normaltext { letter-spacing: 2px; line-height: 2.5em; }
            
            /* iPhone */
            @media only screen
            and (min-device-width : 320px) 
            and (max-device-width : 568px)
            {
                #img { width: 600px; height: 600px; background-image: url('images/sutro.600.jpg'); }
                .bigtext {  font-size: 95px; line-height: 106px; }
                .littleline { line-height: 2em; }
                .normaltext { letter-spacing: 4px; line-height: 3em; }
            }
            
            /* iPad */
            @media only screen
            and (min-device-width : 768px) 
            and (max-device-width : 1024px)
            {
                #img { width: 1000px; height: 1000px; background-image: url('images/sutro.1000.jpg'); }
                .bigtext { font-size: 190px; line-height: 174px; }
                .cursive .post_letter_spacing { letter-spacing: 20px; }
                .littleline { line-height: 4em; }
                .normaltext { font-size: 25px; letter-spacing: 7px; line-height: 3em; }
            }
        </style>
    </head>
    
    <body>
        <?php
            $brooklyn99Quote = 'Hey, just out of curiosity, ' .
                "how many people have you given stds to?\n" .
                "LOTS. Like, a hundred!\n" .
                " - Brooklyn 99 (Season 1, Episode 19)";
        ?>
        <div id="img" title="<?php echo $brooklyn99Quote; ?>">
            <!-- big empty line -->
            <span class="bigtext uppercase">&nbsp;</span><br />
            
            <!-- SAVE -->
            <span class="bigtext uppercase"><!--
                --><span class="post_letter_spacing"><!--
                    -->S<!--
                    --><span class="nice_block_font">av</span><!--
                --></span><!--
                -->e<!--
            --></span><br />
            
            <!-- the -->
            <span class="bigtext cursive"><!--
                --><span class="post_letter_spacing">th</span><!--
                -->e<!--
            --></span><br />
            
            <!-- DATE -->
            <span class="bigtext uppercase"><!--
                --><span class="post_letter_spacing"><!--
                    -->D<!--
                    --><span class="nice_block_font">a</span><!--
                    -->t<!--
                --></span><!--
                -->e<!--
            --></span><br />
            
            <!-- little empty line -->
            <span class="littleline"></span><br />
            
            <!-- Normal Text -->
            <span class="normaltext uppercase">Vincent &amp; Jacklin / May 2, 2015</span><br />
            <span class="normaltext uppercase">Gilroy, CA</span>
        </div>
    </body>
</html>
