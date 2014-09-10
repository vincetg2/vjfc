<?php
    // Redirects to symlinked script
if(0)
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
            @font-face { font-family: theanoDidot; src: url('TheanoDidot-Regular.ttf'); }
            @font-face { font-family: monsieurLaDoulaise; src: url('MonsieurLaDoulaise-Regular.ttf'); }
            
            body { background-color: #f1f0eb; }
            
            #img
            {
                margin: 0 auto;
                text-align: center;
                width: 500px; height: 500px;
                background-image: url('sutro.jpg');
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
                #img { width: 600px; height: 600px; background-image: url('sutro.600.jpg'); }
                .bigtext {  font-size: 95px; line-height: 106px; }
                .littleline { line-height: 2em; }
                .normaltext { letter-spacing: 4px; line-height: 3em; }
            }
            
            /* iPad */
            @media only screen
            and (min-device-width : 768px) 
            and (max-device-width : 1024px)
            {
                #img { width: 1000px; height: 1000px; background-image: url('sutro.1000.jpg'); }
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
        Donate to our flight!
        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
            <input type="hidden" name="cmd" value="_s-xclick">
            <table>
                <tr><td><input type="hidden" name="on0" value="Class">Class</td></tr>
                <tr><td><select name="os0">
                    <option value="Economy">Economy $0.03 USD</option>
                    <option value="Business Class">Business Class $0.04 USD</option>
                    <option value="First Class">First Class $0.05 USD</option>
                </select></td></tr>
            </table>
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
        
        Test 2
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

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
        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_viewcart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </body>
</html>
