<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */

/**
 * 生成验证码函数
 * @param  integer $width  画布宽度
 * @param  integer $height 画布高度
 * @param  integer $length 验证码长度
 * @param  integer $type   验证码类型,1为全数字，2为全字母，3数字与字母结合方式
 * @param  integer $pixel  点状干扰元素
 * @param  integer $line   横线干扰元素
 * @return png          
 */
function code($width=80,$height=40,$length=4,$type=3,$pixel=50,$line=0){
    $img=imagecreatetruecolor($width,$height);
    $white=imagecolorallocate($img,255,255,255);
    imagefill($img,0,0,$white);

    if($type==1){
        $code=implode('',range(0,9));
    }elseif($type==2){
        $code=implode('',array_merge(range('a','z'),range('A','Z')));
    }elseif($type==3){
        $code=implode('',array_merge(range('a','z'),range(0,9),range('A','Z')));
    }
    $code=str_shuffle($code);
    $_code=substr($code,0,$length);
    $_SESSION['_code']=strtolower($_code);

    $fontfiles=array('1.ttf','2.ttf','3.ttf','ggbi.ttf');
    for($i=0;$i<$length;$i++){
        $size=mt_rand(14,18);
        $angle=mt_rand(-15,15);
        $x=10+$i*$size;
        $y=mt_rand(24,28);
        $fontfile='./fonts/'.$fontfiles[mt_rand(0,count($fontfiles)-1)];
        $color=imagecolorallocate($img, mt_rand(0,90), mt_rand(90,190), mt_rand(190,255));
        $text=substr($_code,$i,1);
        imagettftext($img, $size, $angle, $x, $y, $color, $fontfile, $text);
    }

    if($pixel){
        for($i=0;$i<$pixel;$i++){
            $x=mt_rand(0,$width);
            $y=mt_rand(0,$height);
            $color=imagecolorallocate($img,mt_rand(0,90),mt_rand(90,190),mt_rand(190,255));
            imagesetpixel($img, $x, $y, $color);
        }
    }

    if($line){
        for($i=0;$i<$line;$i++){
            $x1=mt_rand(0,$width);
            $y1=mt_rand(0,$height);
            $x2=mt_rand(0,$width);
            $y2=mt_rand(0,$height);
            $color=imagecolorallocate($img,mt_rand(0,90),mt_rand(90,190),mt_rand(190,255));
            imageline($img, $x1, $y1, $x2, $y2, $color);
        }
    }

    header("content-type:image/png");
    imagepng($img);
    imagedestroy($img);
}

    


?>