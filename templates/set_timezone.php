<div id="content">



<?php echo form_open('c=home&m=setTimezone'); ?>

<table align=" " border="0" cellspacing="0">
<tbody>

<tr>
	<td align="right"><h3>TimeZone</h3></td>
	<td align="left"></td></tr>
<tr>

	<td align="right"> </td>
	<td align="left">

		<select name="timezone">
			<option value ="GMT"   <?php if($timezone=='Etc/GMT') echo 'selected';?>  >GMT Western Europe Time, London, Lisbon, Casablanca</option>
			<option value ="GMT-1" <?php if($timezone=='Etc/GMT-1') echo 'selected';?>  >GMT+1 Brussels, Copenhagen, Madrid, Paris</option>
			<option value ="GMT+1" <?php if($timezone=='Etc/GMT+1') echo 'selected';?>  >GMT-1 Azores, Cape Verde Islands</option>
			<option value ="GMT-2" <?php if($timezone=='Etc/GMT-2') echo 'selected';?>  >GMT+2 Kaliningrad, South Africa</option>
			<option value ="GMT+2" <?php if($timezone=='Etc/GMT+2') echo 'selected';?>  >GMT-2 Mid-Atlantic</option>
			<option value ="GMT-3" <?php if($timezone=='Etc/GMT-3') echo 'selected';?>  >GMT+3 Baghdad, Riyadh, Moscow, St. Petersburg</option>
			<option value ="GMT+3" <?php if($timezone=='Etc/GMT+3') echo 'selected';?>  >GMT-3 Brazil, Buenos Aires, Georgetown</option>
			<option value ="GMT-4" <?php if($timezone=='Etc/GMT-4') echo 'selected';?>  >GMT+4 Abu Dhabi, Muscat, Baku, Tbilisi</option>
			<option value ="GMT+4" <?php if($timezone=='Etc/GMT+4') echo 'selected';?>  >GMT-4 Atlantic Time (Canada), Caracas, La Paz</option>
			<option value ="GMT-5" <?php if($timezone=='Etc/GMT-5') echo 'selected';?>  >GMT+5 Ekaterinburg, Islamabad, Karachi, Tashkent</option>
			<option value ="GMT+5" <?php if($timezone=='Etc/GMT+5') echo 'selected';?>  >GMT-5 Eastern Time (US &amp; Canada), Bogota, Lima</option>
			<option value ="GMT-6" <?php if($timezone=='Etc/GMT-6') echo 'selected';?>  >GMT+6 Almaty, Dhaka, Colombo</option>
			<option value ="GMT+6" <?php if($timezone=='Etc/GMT+6') echo 'selected';?>  >GMT-6 Central Time (US &amp; Canada), Mexico City</option>
			<option value ="GMT-7" <?php if($timezone=='Etc/GMT-7') echo 'selected';?>  >GMT+7 Bangkok, Hanoi, Jakarta</option>
			<option value ="GMT+7" <?php if($timezone=='Etc/GMT+7') echo 'selected';?>  >GMT-7 Mountain Time (US &amp; Canada)</option>
			<option value ="GMT-8" <?php if($timezone=='Etc/GMT-8') echo 'selected';?>  >GMT+8 Beijing, Perth, Singapore, Hong Kong</option>
			<option value ="GMT+8" <?php if($timezone=='Etc/GMT+8') echo 'selected';?>  >GMT-8 Pacific Time (US &amp; Canada)</option>
			<option value ="GMT-9" <?php if($timezone=='Etc/GMT-9') echo 'selected';?>  >GMT+9 Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
			<option value ="GMT+9" <?php if($timezone=='Etc/GMT+9') echo 'selected';?>  >GMT-9 Alaska</option>
			<option value ="GMT-10" <?php if($timezone=='Etc/GMT-10') echo 'selected';?>  >GMT+10 Eastern Australia, Guam, Vladivostok</option>
			<option value ="GMT+10" <?php if($timezone=='Etc/GMT+10') echo 'selected';?>  >GMT-10 Hawaii</option>
			<option value ="GMT-11" <?php if($timezone=='Etc/GMT-11') echo 'selected';?>  >GMT+11 Magadan, Solomon Islands, New Caledonia</option>
			<option value ="GMT+11" <?php if($timezone=='Etc/GMT+11') echo 'selected';?>  >GMT-11 Midway Island, Samoa</option>
			<option value ="GMT-12" <?php if($timezone=='Etc/GMT-12') echo 'selected';?>  >GMT+12 Auckland, Wellington, Fiji, Kamchatka</option>
			<option value ="GMT+12" <?php if($timezone=='Etc/GMT+12') echo 'selected';?>  >GMT-12 Eniwetok, Kwajalein</option>
			<option value ="Greenwich" <?php if($timezone=='Etc/Greenwich') echo 'selected';?>  >Greenwich</option>
			<option value ="UCT" <?php if($timezone=='Etc/UCT') echo 'selected';?>  >UCT</option>
			<option value ="Universal" <?php if($timezone=='Etc/Universal') echo 'selected';?>  >Universal</option>
			<option value ="Zulu" <?php if($timezone=='Etc/Zulu') echo 'selected';?>  >Zulu</option>
		</select>
	</td>
</tr>


<tr>
<td align="right"></td></tr>
<tr>
<td colspan="2" align="center">
<input name="setTimezone" value="Update" type="submit"  class="btn">
</td>
</tr></tbody></table>


</form>

<div class="warnning">
Tips:This action will delete hashrate history data.
</div>

</div>