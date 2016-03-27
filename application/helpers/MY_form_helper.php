<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('dob_field')) {
	function dob_field() {
		return ' <div class="form-group">
    <label for="pwd" class="col-sm-3 control-label">Date of Birth*</label>
    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
          <select name="bd_month" class="form-control" id="bd_month">
            <option>
              - Month -
            </option>
            <option value="01">
              January
            </option>
            <option value="02">
              February
            </option>
            <option value="03">
              March
            </option>
            <option value="04">
              April
            </option>
            <option value="05">
              May
            </option>
            <option value="06">
              June
            </option><option value="07">
            Jully
          </option><option value="08">
          Augest
        </option><option value="09">
        Sept
      </option><option value="10">
      October
    </option><option value="11">
    November
  </option><option value="12">
  December
</option>
</select>
</div>
<div class="col-md-4 col-sm-4 col-xs-4">
  <select name="bd_day"  class="form-control" id="bd_day">
    <option>
      - Day -
    </option>
    <option value="1">
      1
    </option>
    <option value="2">
      2
    </option>
    <option value="3">
      3
    </option>
    <option value="4">
      4
    </option>
    <option value="5">
      5
    </option>
    <option value="6">
      6
    </option>
    <option value="7">
      7
    </option>
    <option value="8">
      8
    </option>
    <option value="9">
      9
    </option>
    <option value="10">
      10
    </option>
    <option value="11">
      11
    </option>
    <option value="12">
      12
    </option>
    <option value="13">
      13
    </option>
    <option value="14">
      14
    </option>
    <option value="15">
      15
    </option>
    <option value="16">
      16
    </option>
    <option value="17">
      17
    </option>
    <option value="18">
      18
    </option>
    <option value="19">
      19
    </option>
    <option value="20">
      20
    </option>
    <option value="21">
      21
    </option>
    <option value="22">
      22
    </option>
    <option value="23">
      23
    </option>
    <option value="24">
      24
    </option>
    <option value="25">
      25
    </option>
    <option value="26">
      26
    </option>
    <option value="27">
      27
    </option>
    <option value="28">
      28
    </option>
    <option value="29">
      29
    </option>
    <option value="30">
      30
    </option>
    <option value="31">
      31
    </option>

  </select>
</div>
<div class="col-md-4 col-sm-4 col-xs-4">
  <select name="bd_year" class="form-control" id="bd_year">
    <option>
      - Year -
    </option>
    <option value="2013">
      2013
    </option>
    <option value="2012">
      2012
    </option>
    <option value="2011">
      2011
    </option>
    <option value="2010">
      2010
    </option>
    <option value="2009">
      2009
    </option>
    <option value="2008">
      2008
    </option>
    <option value="2007">
      2007
    </option>
    <option value="2006">
      2006
    </option>
    <option value="2005">
      2005
    </option>
    <option value="2004">
      2004
    </option>
    <option value="2003">
      2003
    </option>
    <option value="2002">
      2002
    </option>
    <option value="2001">
      2001
    </option>
    <option value="2000">
      2000
    </option>
    <option value="1999">
      1999
    </option>
    <option value="1998">
      1998
    </option>
    <option value="1997">
      1997
    </option>
    <option value="1996">
      1996
    </option>
    <option value="1995">
      1995
    </option>
  <option value="1994">
      1994
    </option>
  <option value="1993">
      1993
    </option>
  <option value="1992">
      1992
    </option>
  <option value="1991">
      1991
    </option>
  <option value="1990">
      1990
    </option>
  <option value="1989">
      1989
    </option>
  <option value="1988">
      1988
    </option>
  <option value="1987">
      1987
    </option>
  <option value="1986">
      1986
    </option>
  <option value="1985">
      1985
    </option>
  <option value="1984">
      1984
    </option>
  <option value="1983">
      1983
    </option>
  <option value="1982">
      1982
    </option>
  <option value="1981">
      1981
    </option>
  <option value="1980">
      1980
    </option>
  <option value="1979">
      1979
    </option>
  <option value="1978">
      1978
    </option>
  <option value="1977">
      1977
    </option>
  <option value="1976">
      1976
    </option>
  <option value="1975">
      1975
    </option>
  </select>
</div>
</div>
</div>
</div>';
	}
}
if (!function_exists('dob_field_update')) {
	function dob_field_update($val = '') {
		return '<div class="form-group">
              <label for="dob" class="control-label">Date of Birth*</label>
               <input type="text" name="dob" value="' . set_value('dob', $val) . '" class="datepicker form-control" placeholder="Enter Date of Birth">
            </div>';
	}
}