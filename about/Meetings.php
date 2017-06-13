<?php
  class Meetings {

    /*
      Meetings default to the first Tuesday of the month.
      If a meeting is rescheduled, simply add the NEW DATE
      to the $rescheduled_to array below this comment block
      in YYYY-MM-DD format enclosed in quotes and followed
      by a comma.

      For example, the first Tuesday in January of 2013 was the 1st,
      thus the meeting was rescheduled for the 8th:

      $rescheduled_to = array(
        "2013-01-08",
      );

      The new date does not have to be a Tuesday.

      As many dates as needed can be included, here we
      have the first three meetings of 2013 all on
      the 6th of the month:

      $rescheduled_to = array(
        "2013-01-06",
        "2013-02-06",
        "2013-03-06",
      );
    */

    /***** add rescheduled dates below *****/
    private static $rescheduled_to = array(
      "2017-07-11",
      "2017-09-12",
    );


    /***** do not edit anything below this line *****/

    private static function get_meeting( $this_month, $this_year ) {

      // defaults to first tuesday of the month
      $mtng_time = strtotime( "tuesday ".$this_year."-".$this_month );

      // check if it has been rescheduled
      foreach( Meetings::$rescheduled_to as $item ) {
        if ( preg_match( "/^".$this_year."-".$this_month."/", $item ) ) {
          $mtng_time = strtotime( $item );
        }
      }
      return $mtng_time;
    }

    public static function get_next() {

      $return_str = "To Be Determined";

      $now = time();
      $this_year = date( "Y", time() );
      $this_month = date( "m", time() );

      // get meeting for the current month
      $mtng_time = Meetings::get_meeting( $this_month, $this_year );

      // check if the meeting for this month has passed
      // and if it has, get next months meeting
      if ( $mtng_time < $now ) {

        $this_month = intval($this_month)+1;
        if ($this_month > 12) {
          $this_year = intval($this_year)+1;
          $this_month = 1;
        }

        $this_month =  str_pad(intval($this_month),2,"0",STR_PAD_LEFT);;

        $mtng_time = $mtng_time = Meetings::get_meeting( $this_month, $this_year );
      }

      $return_str = date( "l, F j", $mtng_time );

      return $return_str;
  }
}
