<script type="text/javascript">
function showContentSite()
{
    var showSectionID = "<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>TableSection"+$("<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>TableSection").value;
    var totalOptions = $("<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>TableSection").options.length;
    for(var numOption = 0;numOption < totalOptions;numOption++){
        var mySectionElem = "<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>TableSection"+ $("<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>TableSection").options[numOption].value;
        $(mySectionElem).style.display = 'none';
    }
    $(showSectionID).style.display = 'block';
}
</script>
<table>
	<tr>
		<td width="100%">
			<?php echo JText::_( 'Section' ); ?>:
			<?php echo $this->lists["sections"]; ?>
		</td>
	</tr>
</table>
<?php $styleTable = "display:block;"; ?>
<?php foreach($this->sectionsList as $sections): ?>
<table class="adminlist" cellspacing="1" id="<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>TableSection<?php echo $sections->id; ?>" style="<?php echo $styleTable; ?>">
	<thead>
		<tr>
			<th width="1%">
				<?php echo JText::_( 'ID' ); ?>
			</th>
			<th width="20%" class="title">
				<?php echo JText::_( 'Categories' ); ?>
			</th>
            <th width="9%" nowrap="nowrap">
                <?php echo JText::_( 'Access Level' ); ?>
            </th>
			<th width="70%" nowrap="nowrap">
				<?php echo JText::_( 'Permisions' ); ?>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php if( empty($sections->categoryList) ): ?>
	<tr class="row0">
		<td align="center" colspan="100%"><?php echo JText::_('There are no Categories'); ?></td>
	</tr>
	<?php else: ?>
        <?php $k = 0; ?>
		<?php foreach($sections->categoryList as $categorie): ?>
        <?php $access = JHTML::_('grid.access', $categorie, $k ); ?>
        <?php $k = $k % 2; ?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center"><?php echo $categorie->id; ?></td>
			<td align="center">
                <?php if($categorie->access): ?>
                    <a href="#" onclick="showAdapterTasks('<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>Category<?php echo $categorie->id; ?>Tasks')">
                <?php endif; ?>
                    <?php echo $categorie->title; ?>
                <?php if($categorie->access): ?>
                    </a>
                <?php endif; ?>
            </td>
            <td align="center"><?php echo $access; ?></td>
            <td align="center">
            <?php
                $groupName = JRequest::getVar( 'groupName' );
                $extraParams = array(
                    '$catid' => $categorie->id
                );
                $groupTasks = $this->adapterControl->loadGroupTasks($groupName,$this->adapterName,$this->viewName,$extraParams);
                ?>
                <div id="<?php echo $this->adapterName; ?><?php echo $this->viewName; ?>Category<?php echo $categorie->id; ?>">
                <?php
                        if($categorie->access){
                            if( !empty($groupTasks) ){
                                echo trim(implode(',',$groupTasks));
                            }
                            else{
                                echo JText::_( 'none' );
                            }
                        }
                        else{
                           echo JText::_( 'You can not set permissions in' ); ?> <?php echo $categorie->groupname; ?> <?php echo JText::_( 'access level' );
                        }
                    ?>
                </div>
                <?php
                /**
                 * Loading category params
                 */
                $this->adapterControl->renderTasks($this->adapterName,$this->viewName,$this->tasks,"Category{$categorie->id}",$groupTasks,"[{$categorie->id}]");
                ?>
			</td>
		</tr>
        <?php $k++; ?>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>
<?php $styleTable = "display:none;"; ?>
<?php endforeach; ?>