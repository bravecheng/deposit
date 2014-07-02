package com.yahoo.astra.utils
{
	/**
	 * A collection of utility functions for the manipulation of numeric values.
	 * 
	 * @author Josh Tynjala
	 */
	public class NumberUtil
	{
		/**
		 * Rounds a Number to the nearest multiple of an input. For example, by rounding
		 * 16 to the nearest 10, you will receive 20. Similar to the built-in function Math.round().
		 * 
		 * @param	numberToRound		the number to round
		 * @param	nearest				the number whose mutiple must be found
		 * @return	the rounded number
		 * 
		 * @see Math#round
		 */
		public static function roundToNearest(number:Number, nearest:Number = 1):Number
		{
			return Math.round(NumberUtil.roundToPrecision(number / nearest, 10)) * nearest;
		}
		
		/**
		 * Rounds a Number <em>up</em> to the nearest multiple of an input. For example, by rounding
		 * 16 up to the nearest 10, you will receive 20. Similar to the built-in function Math.ceil().
		 * 
		 * @param	numberToRound		the number to round up
		 * @param	nearest				the number whose mutiple must be found
		 * @return	the rounded number
		 * 
		 * @see Math#ceil
		 */
		public static function roundUpToNearest(number:Number, nearest:Number = 1):Number
		{
			return Math.ceil(NumberUtil.roundToPrecision(number / nearest, 10)) * nearest;
		}
		
		/**
		 * Rounds a Number <em>down</em> to the nearest multiple of an input. For example, by rounding
		 * 16 down to the nearest 10, you will receive 10. Similar to the built-in function Math.floor().
		 * 
		 * @param	numberToRound		the number to round down
		 * @param	nearest				the number whose mutiple must be found
		 * @return	the rounded number
		 * 
		 * @see Math#floor
		 */
		public static function roundDownToNearest(number:Number, nearest:Number = 1):Number
		{
			return Math.floor(NumberUtil.roundToPrecision(number / nearest, 10)) * nearest;
		}
		
		/**
		 * Rounds a number to a certain level of precision. Useful for limiting the number of
		 * decimal places on a fractional number.
		 * 
		 * @param		number		the input number to round.
		 * @param		precision	the number of decimal digits to keep
		 * @return		the rounded number, or the original input if no rounding is needed
		 * 
		 * @see Math#round
		 */
		public static function roundToPrecision(number:Number, precision:int = 0):Number
		{
			var decimalPlaces:Number = Math.pow(10, precision);
			return Math.round(decimalPlaces * number) / decimalPlaces;
		}
		
		/**
		 * Tests equality for numbers that may have been generated by faulty floating point math.
		 * This is not an issue exclusive to the Flash Player, but all modern computing in general.
		 * The value is generally offset by an insignificant fraction, and it may be corrected.
		 * 
		 * <p>Alternatively, this function could be used for other purposes than to correct floating
		 * point errors. Certainly, it could determine if two very large numbers are within a certain
		 * range of difference. This might be useful for determining "ballpark" estimates or similar
		 * statistical analysis that may not need complete accuracy.</p>
		 * 
		 * @param		number1		the first number to test
		 * @param		number2		the second number to test
		 * @param		precision	the number of digits in the fractional portion to keep
		 * @return		true, if the numbers are close enough to be considered equal, false if not.
		 */
		public static function fuzzyEquals(number1:Number, number2:Number, precision:int = 5):Boolean
		{
			var difference:Number = number1 - number2;
			var range:Number = Math.pow(10, -precision);
			
			//default precision checks the following:
			//0.00001 < difference > -0.00001
			
			return difference < range && difference > -range;
		}
	}
}
