<?php
/**
 * @copyright Copyright (c) 2017 Joas Schilling <coding@schilljs.com>
 *
 * @author Joas Schilling <coding@schilljs.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
// style('gadgetbridge', 'gadgetbridge');
// script('gadgetbridge', 'gadgetbridge');
// script('gadgetbridge', 'Chart');

/** @var $l \OCP\IL10N */
/** @var $_ array */
?>
<div id="content">
<Gadgetbridge db-path="<?= p($_['databasePath']);?>" >
</Gadgetbridge>
</div>
<!-- <div id="app-navigation">
	<ul>
		<li class="open-database">
			<a id="import-data" href="#">
				<img alt="" src="<?php print_unescaped(image_path('core', 'actions/upload.svg')); ?>">
				<span><?php p($l->t('Select database')) ?></span>
			</a>
		</li>
		<li class="settings-caption <?php p(empty($_['databasePath']) ? 'hidden' : ''); ?>"><?php p($_['databasePath']); ?></li>
	</ul>
</div>


<div id="app-content" data-database-id="<?php p($_['databaseId']); ?>" data-database-path="<?php p($_['databasePath']); ?>">
	<div id="emptycontent" class="<?php p($_['database'] === 0 ? '' : 'hidden'); ?>">
		<div class="icon-activity"></div>
		<h2><?php p($l->t('No data found')); ?></h2>
		<p><?php p($l->t('Import the data from your Android app')); ?></p>
	</div>

	<div id="container">
		<canvas id="steps"></canvas>
	</div>

	<div id="" class="hidden FIXME icon-loading"></div>
</div> -->
