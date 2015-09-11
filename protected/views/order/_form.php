<ul>
<? foreach($days as $number => $daytime): ?>
	<li class="day-cont">
		<h2>День <?=$number+1?></h2>
	    <div class="daytime-cont">
	        <h3>Утро</h3>
	        <table  class="b-table" border="1"> 
	        	<tbody>
	        	<tr class="b-filter">
	        		<td class="align-left">Название</td>
	        		<td>Количество</td>
	        	</tr>
	            <? if(isset($daytime[1])): ?>
	                <? foreach($daytime[1] as $item): ?>
						<tr>
	                        <td class="align-left"><?=$item['name']?></td>
	                    	<td><?=$item['count']?></td>
	                    </tr> 
	                <? endforeach; ?>  
	            <? endif; ?>
	            </tbody>
	        </table>
	    </div>
	    <div class="daytime-cont">
	        <h3>День</h3>
	        <table  class="b-table" border="1"> 
	        	<tbody>
	        	<tr class="b-filter">
	        		<td class="align-left">Название</td>
	        		<td>Количество</td>
	        	</tr>
	            <? if(isset($daytime[2])): ?>
	                <? foreach($daytime[2] as $item): ?>
						<tr>
	                        <td class="align-left"><?=$item['name']?></td>
	                    	<td><?=$item['count']?></td>
	                    </tr> 
	                <? endforeach; ?>  
	            <? endif; ?>
	            </tbody>
	        </table>
	    </div>
	    <div class="daytime-cont">
	        <h3>Вечер</h3>
	        <table  class="b-table" border="1"> 
	        	<tbody>
	        	<tr class="b-filter">
	        		<td class="align-left">Название</td>
	        		<td>Количество</td>
	        	</tr>
	            <? if(isset($daytime[3])): ?>
	                <? foreach($daytime[3] as $item): ?>
						<tr>
	                        <td class="align-left"><?=$item['name']?></td>
	                    	<td><?=$item['count']?></td>
	                    </tr> 
	                <? endforeach; ?>  
	            <? endif; ?>
	            </tbody>
	        </table>
	    </div>
	</li>
<? endforeach; ?>  
</ul>
<div class="row buttons clearfix left">
	<input type="button" onclick="$.fancybox.close(); return false;" value="ОК">
</div>