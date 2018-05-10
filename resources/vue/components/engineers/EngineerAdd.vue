<template>
    <div class="engineer-add">

		<md-field>
			<label>Прізвище</label>
				<md-input name="last-name"/>
		</md-field>

		<md-field>
			<label>Ім'я</label>
				<md-input name="first-name"/>
		</md-field>

		<md-field>
			<label>По батькові</label>
				<md-input name="middle-name"/>
		</md-field>

		<md-field>
			<label>Моб. телефон</label>
				<md-input name="phone-number"></md-input>
		</md-field>

		<md-field>
			<label>Персональний номер</label>
				<md-input name="personal-number"></md-input>
		</md-field>

		<md-field>
			<label>Домашня адреса</label>
				<md-input name="home-adress"></md-input>
		</md-field>

		<md-field>
			<label>Категорія</label>
				<md-select>
					<md-option>Інженер</md-option>
					<md-option>Технолог</md-option>
					<md-option>Технік</md-option>
				</md-select>
		</md-field>

		<md-datepicker>
			
		</md-datepicker>


		<md-button class="md-raised md-accent">Назад</md-button>
        <md-button class="md-raised md-primary">Додати</md-button>
    </div>
</template>

<script>
	import axios from 'axios';

	export default {
		data: () => ({
			workshops: [],
		}),
		created() {
			this.fetchWorkshops();
		},
		methods: {
			fetchWorkshops() {
				axios.get('workshop').then(response => {
					this.workshops = response.workshops;
				})
			}
		}
	}
</script>

<style>
	.md-select-menu {
		z-index: 200;
	}
	.dialog-alert {
		z-index: 999;
	}

	.md-datepicker-dialog {
		top: 222px;
		z-index: 999;
	}
</style>
