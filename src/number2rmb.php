<?php
namespace juju\number2rmb;

use Yii;

class Number2rmb
{
	public function convert($num)
	{
		$num = round( $num, 2 );
	    if ( $num <= 0 ){
	        return '零元';
	    }
	    $unit = array( '', '拾', '佰', '仟', '', '万', '亿', '兆' );
	    $char = array( '零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖' );
	    $arr = explode( '.', $num );
	    $num = strrev( $arr[0] );
	    $len = strlen( $num );
	    for ( $i = 0; $i < $len; $i++ ){
	        $int[$i] = $char[$num[$i]];
	        if ( !empty( $num[$i] ) ){
	            $int[$i] .= $unit[$i%4];
	        }
	        if ( $i%4 == 0 ){
	            $int[$i] .= $unit[4+floor($i/4)];
	        }
	    }
	    $dec = isset($arr[1]) ? '元' . $char[$arr[1][0]] . '角'. $char[$arr[1][1]] . '分' : '元整';
	    return implode( '', array_reverse( $int ) ) . $dec;
	}
}