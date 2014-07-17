<?php
/**
 * word2uni
 * This code is a part of aCAPTCHA project, This copyright notice MUST stay intact for use
 * @package aCAPTCHA 
 * @author Abd Allatif Eymsh
 * @copyright (c) 2012
 * @param string $word
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v2
 */
function word2uni($word)
{

	$new_word = array();
	$char_type = array();
	$isolated_chars = array('ا', 'د', 'ذ', 'أ', 'آ', 'ر', 'ؤ', 'ء', 'ز', 'و', 'ى', 'ة');

	$all_chars = array
		(
			'ا' => array(
	
				'middle'		=>   '&#xFE8E;',

				'isolated'		=>   '&#xFE8D;'
				),
		
			'ؤ' => array(
	
				'middle'		=>   '&#xFE85;',

				'isolated'		=>   '&#xFE86;'
				),
			'ء' => array(
				'middle'		=>   '&#xFE80;',
				'isolated'		=>   '&#xFE80;'
				),
			'أ' => array(
	
				'middle'		=>   '&#xFE84;',

				'isolated'		=>   '&#xFE83;'
				),
			'آ' => array(
	
				'middle'		=>   '&#xFE82;',

				'isolated'		=>   '&#xFE81;'
				),
			'ى' => array(
	
				'middle'		=>   '&#xFEF0;',

				'isolated'		=>   '&#xFEEF;'
				),
			'ب' => array(
				'beginning'		=>   '&#xFE91;',
				'middle'		=>   '&#xFE92;',
				'end'			=>   '&#xFE90;',
				'isolated'		=>   '&#xFE8F;'
				),
			'ت' => array(
				'beginning'		=>   '&#xFE97;',
				'middle'		=>   '&#xFE98;',
				'end'			=>   '&#xFE96;',
				'isolated'		=>   '&#xFE95;'
				),
			'ث' => array(
				'beginning'		=>   '&#xFE9B;',
				'middle'		=>   '&#xFE9C;',
				'end'			=>   '&#xFE9A;',
				'isolated'		=>   '&#xFE99;'
				),
			'ج' => array(
				'beginning'		=>   '&#xFE9F;',
				'middle'		=>   '&#xFEA0;',
				'end'			=>   '&#xFE9E;',
				'isolated'		=>   '&#xFE9D;'
				),
			'ح' => array(
				'beginning'		=>   '&#xFEA3;',
				'middle'		=>   '&#xFEA4;',
				'end'			=>   '&#xFEA2;',
				'isolated'		=>   '&#xFEA1;'
				),
			'خ' => array(
				'beginning'		=>   '&#xFEA7;',
				'middle'		=>   '&#xFEA8;',
				'end'			=>   '&#xFEA6;',
				'isolated'		=>   '&#xFEA5;'
				),
			'د' => array(
				'middle'		=>   '&#xFEAA;',
				'isolated'		=>   '&#xFEA9;'
				),
			'ذ' => array(
				'middle'		=>   '&#xFEAC;',
				'isolated'		=>   '&#xFEAB;'
				),
			'ر' => array(
				'middle'		=>   '&#xFEAE;',
				'isolated'		=>   '&#xFEAD;'
				),
			'ز' => array(
				'middle'		=>   '&#xFEB0;',
				'isolated'		=>   '&#xFEAF;'
				),
			'س' => array(
				'beginning'		=>   '&#xFEB3;',
				'middle'		=>   '&#xFEB4;',
				'end'			=>   '&#xFEB2;',
				'isolated'		=>   '&#xFEB1;'
				),
			'ش' => array(
				'beginning'		=>   '&#xFEB7;',
				'middle'		=>   '&#xFEB8;',
				'end'			=>   '&#xFEB6;',
				'isolated'		=>   '&#xFEB5;'
				),
			'ص' => array(
				'beginning'		=>   '&#xFEBB;',
				'middle'		=>   '&#xFEBC;',
				'end'			=>   '&#xFEBA;',
				'isolated'		=>   '&#xFEB9;'
				),
			'ض' => array(
				'beginning'		=>   '&#xFEBF;',
				'middle'		=>   '&#xFEC0;',
				'end'			=>   '&#xFEBE;',
				'isolated'		=>   '&#xFEBD;'
				),
			'ط' => array(
				'beginning'		=>   '&#xFEC3;',
				'middle'		=>   '&#xFEC4;',
				'end'			=>   '&#xFEC2;',
				'isolated'		=>   '&#xFEC1;'
				),
			'ظ' => array(
				'beginning'		=>   '&#xFEC7;',
				'middle'		=>   '&#xFEC8;',
				'end'			=>   '&#xFEC6;',
				'isolated'		=>   '&#xFEC5;'
				),
			'ع' => array(
				'beginning'		=>   '&#xFECB;',
				'middle'		=>   '&#xFECC;',
				'end'			=>   '&#xFECA;',
				'isolated'		=>   '&#xFEC9;'
				),
			'غ' => array(
				'beginning'		=>   '&#xFECF;',
				'middle'		=>   '&#xFED0;',
				'end'			=>   '&#xFECE;',
				'isolated'		=>   '&#xFECD;'
				),
			'ف' => array(
				'beginning'		=>   '&#xFED3;',
				'middle'		=>   '&#xFED4;',
				'end'			=>   '&#xFED2;',
				'isolated'		=>   '&#xFED1;'
				),
			'ق' => array(
				'beginning'		=>   '&#xFED7;',
				'middle'		=>   '&#xFED8;',
				'end'			=>   '&#xFED6;',
				'isolated'		=>   '&#xFED5;'
				),
			'ك' => array(
				'beginning'		=>   '&#xFEDB;',
				'middle'		=>   '&#xFEDC;',
				'end'			=>   '&#xFEDA;',
				'isolated'		=>   '&#xFED9;'
				),
			'ل' => array(
				'beginning'		=>   '&#xFEDF;',
				'middle'		=>   '&#xFEE0;',
				'end'			=>   '&#xFEDE;',
				'isolated'		=>   '&#xFEDD;'
				),
			'م' => array(
				'beginning'		=>   '&#xFEE3;',
				'middle'		=>   '&#xFEE4;',
				'end'			=>   '&#xFEE2;',
				'isolated'		=>   '&#xFEE1;'
				),
			'ن' => array(
				'beginning'		=>   '&#xFEE7;',
				'middle'		=>   '&#xFEE8;',
				'end'			=>   '&#xFEE6;',
				'isolated'		=>   '&#xFEE5;'
				),
			'ه' => array(
				'beginning'		=>   '&#xFEEB;',
				'middle'		=>   '&#xFEEC;',
				'end'			=>   '&#xFEEA;',
				'isolated'		=>   '&#xFEE9;'
				),
			'و' => array(
				'middle'		=>   '&#xFEEE;',
				'isolated'		=>   '&#xFEED;'
				),
			'ي' => array(
				'beginning'		=>   '&#xFEF3;',
				'middle'		=>   '&#xFEF4;',
				'end'			=>   '&#xFEF2;',
				'isolated'		=>   '&#xFEF1;'
				),
			'ئ' => array(
				'beginning'		=>   '&#xFE8B;',
				'middle'		=>   '&#xFE8C;',
				'end'			=>   '&#xFE8A;',
				'isolated'		=>   '&#xFE89;'
				),
			'ة' => array(
				'middle'		=>   '&#xFE94;',
				'isolated'		=>   '&#xFE93;'
				)
		);

	if(in_array($word[0].$word[1], $isolated_chars))
	{
		$new_word[] = $all_chars[$word[0].$word[1]]['isolated'];
		$char_type[] = 'not_normal';
	}
	else
	{
		$new_word[] = $all_chars[$word[0].$word[1]]['beginning'];
		$char_type[] = 'normal';
	}

	if(strlen($word) > 4)
	{
		if($char_type[0] == 'not_normal')

		{
			if(in_array($word[2].$word[3], $isolated_chars))
			{
				$new_word[] = $all_chars[$word[2].$word[3]]['isolated'];
				$char_type[] = 'not_normal';
			}
			else
			{
		
				$new_word[] = $all_chars[$word[2].$word[3]]['beginning'];
				$char_type[] = 'normal';
			}
		}
		else
		{
			$new_word[] = $all_chars[$word[2].$word[3]]['middle'];
			$chars_statue[] = 'middle';

			if(in_array($word[2].$word[3], $isolated_chars))
			{
				$char_type[] = 'not_normal';
			}
			else
			{
				$char_type[] = 'normal';
			}
		}
		$x = 4;
	}
	else
	{
		$x = 2;	
	}
	
	for($x=4;$x< (strlen($word)-4) ;$x++)
	{
		if($char_type[count($char_type)-1] == 'not_normal' AND $x %2 == 0)
		{
			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{
				
				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
				$char_type[] = 'not_normal';
			}
			else
			{
				
				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
				$char_type[] = 'normal';
			}
		}
		elseif($char_type[count($char_type)-1] == 'normal' AND $x %2 == 0)
		{
			
			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{
				
				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'not_normal';
			}
			else
			{
				
				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'normal';
			}
		}

	}
	if(strlen($word)>6)
	{
		if($char_type[count($char_type)-1] == 'not_normal')
		{
			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{
				
				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
				$char_type[] = 'not_normal';
			}
			else
			{
				
				if($word[strlen($word)-2].$word[strlen($word)-1] == 'ء')
				{
					$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
					$char_type[] = 'normal';
				}
				else
				{
					$new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
					$char_type[] = 'normal';
				}
					
			}

			$x += 2;
		}
		elseif($char_type[count($char_type)-1] == 'normal')
		{
			
			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{
				
				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'not_normal';
			}
			else
			{
				
				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'normal';
			}

			$x += 2;
		}
		
		
	}
	
	if($char_type[count($char_type)-1] == 'not_normal')
	{

		if(in_array($word[$x].$word[$x+1], $isolated_chars))
		{		
		
			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

		}
		else
		{
			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

		}

	}
	else
	{
		if(in_array($word[$x].$word[$x+1], $isolated_chars))
		{
			
			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];

		}
		else
		{
			
			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['end'];

		}
	}

	return implode('',array_reverse($new_word));
}
?>