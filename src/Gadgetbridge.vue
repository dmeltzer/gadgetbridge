<template>
<Content :class="{'icon-loading': loading}" app-name="gadgetbridge">
		<AppNavigation>
			<AppNavigationNew v-if="!loading"
				:text="t('gadgetbridge', 'Select Database')"
				:disabled="false"
				button-id="new-gadgetbridge-button"
				button-class="icon-add"
				@click="filePickDatabase" />
			<ActionCheckbox v-if="databasePath">{{databasePath}}</ActionCheckbox>
		</AppNavigation>
		<AppContent>
			<span>This is the content</span>
			<button @click="show = !show">
				Toggle sidebar
			</button>
		</AppContent>
		<AppSidebar v-show="show"
			title="eberhard-grossgasteiger-VDw-nsi5TpE-unsplash.jpg"
			subtitle="4,3 MB, last edited 41 days ago"
			@close="show=false">
			<template #primary-actions>
				<button class="primary">
					Button 1
				</button>
				<input id="link-checkbox"
					name="link-checkbox"
					class="checkbox link-checkbox"
					type="checkbox">
				<label for="link-checkbox" class="link-checkbox-label">Do something</label>
			</template>
			<template #secondary-actions>
				<ActionButton icon="icon-edit" @click="alert('Edit')">
					Edit
				</ActionButton>
				<ActionButton icon="icon-delete" @click="alert('Delete')">
					Delete
				</ActionButton>
				<ActionLink icon="icon-external" title="Link" href="https://nextcloud.com" />
			</template>
			<AppSidebarTab id="gadgetbridge" name="gadgetbridge" icon="icon-gadgetbridge">
				this is the gadgetbridge tab
			</AppSidebarTab>
			<AppSidebarTab id="activity" name="Activity" icon="icon-activity">
				this is the activity tab
			</AppSidebarTab>
			<AppSidebarTab id="comments" name="Comments" icon="icon-comment">
				this is the comments tab
			</AppSidebarTab>
			<AppSidebarTab id="sharing" name="Sharing" icon="icon-shared">
				this is the sharing tab
			</AppSidebarTab>
			<AppSidebarTab id="versions" name="Versions" icon="icon-history">
				this is the versions tab
			</AppSidebarTab>
		</AppSidebar>
	</Content>
</template>
<script>
import Content from '@nextcloud/vue/dist/Components/Content'
import AppContent from '@nextcloud/vue/dist/Components/AppContent'
import AppNavigation from '@nextcloud/vue/dist/Components/AppNavigation'
import AppNavigationItem from '@nextcloud/vue/dist/Components/AppNavigationItem'
import AppNavigationNew from '@nextcloud/vue/dist/Components/AppNavigationNew'
import AppNavigationSettings from '@nextcloud/vue/dist/Components/AppNavigationSettings'
import AppSidebar from '@nextcloud/vue/dist/Components/AppSidebar'
import AppSidebarTab from '@nextcloud/vue/dist/Components/AppSidebarTab'
import AppNavigationCounter from '@nextcloud/vue/dist/Components/AppNavigationCounter'
import ActionButton from '@nextcloud/vue/dist/Components/ActionButton'
import ActionLink from '@nextcloud/vue/dist/Components/ActionLink'
import AppNavigationIconBullet from '@nextcloud/vue/dist/Components/AppNavigationIconBullet'
import ActionCheckbox from '@nextcloud/vue/dist/Components/ActionCheckbox'
import ActionInput from '@nextcloud/vue/dist/Components/ActionInput'
import ActionRouter from '@nextcloud/vue/dist/Components/ActionRouter'
import ActionText from '@nextcloud/vue/dist/Components/ActionText'
import ActionTextEditable from '@nextcloud/vue/dist/Components/ActionTextEditable'

import axios from 'axios'
axios.defaults.headers.post['Accept'] = 'application/json';

import { showMessage, getFilePickerBuilder, FilePicker, FilePickerBuilder } from '@nextcloud/dialogs'

import '@nextcloud/dialogs/styles/toast.scss'

export default {
	name: 'App',
	components: {
		Content,
		AppContent,
		AppNavigation,
		AppNavigationItem,
		AppNavigationNew,
		AppNavigationSettings,
		AppSidebar,
		AppSidebarTab,
		AppNavigationCounter,
		ActionButton,
		ActionLink,
		AppNavigationIconBullet,
		ActionCheckbox,
		ActionInput,
		ActionRouter,
		ActionText,
		ActionTextEditable,
	},
	props: [ 'dbPath' ],
	data: function() {
		return {
            databasePath: this.dbPath,
            loading: false,
            show: true,
		}
	},
	methods: {
		addOption(val) {
			this.options.push(val)
			this.select.push(val)
		},
		previous(data) {
			console.debug(data)
		},
		next(data) {
			console.debug(data)
		},
		close(data) {
			console.debug(data)
		},
		filePickDatabase(e) {
			showMessage( "Test Message" );
			const picker = getFilePickerBuilder("Test")
				.setMultiSelect(false)
				.setModal(true)
				.build();


			picker.pick()
				.then(file => {
					axios.post(OC.linkToOCS('apps/gadgetbridge/api/v1', 2) + 'database', {
						path: file
					})
				})
				.catch(error => { 
					OC.Notification. showTemporary(t('gadgetbridge', 'The selected file is not a readable Gadgetbridge database'));
				});
		},
		log(e) {
			console.debug(e)
		},
	},
}
</script>