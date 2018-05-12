<template>
    <div class="engineer-add">
		<md-dialog-alert
				class="dialog-alert"
				:md-active.sync="added"
				md-title="Додано!"
				md-content="Ваші дані успішно внесено до бази даних" />

		<span class="md-display-1">Додати інженера</span>

		<md-field>
			<label>Прізвище</label>
				<md-input name="last-name" v-model="engineer.last_name"/>
		</md-field>

		<md-field>
			<label>Ім'я</label>
				<md-input name="first-name" v-model="engineer.first_name"/>
		</md-field>

		<md-field>
			<label>По батькові</label>
				<md-input name="middle-name" v-model="engineer.middle_name"/>
		</md-field>

		<md-field>
			<label>Моб. телефон</label>
				<md-input name="phone-number" v-model="engineer.phone_number"></md-input>
		</md-field>

		<md-field>
			<label>Персональний номер</label>
				<md-input name="personal-number" v-model="engineer.personal_number"></md-input>
		</md-field>

		<md-field>
			<label>Домашня адреса</label>
				<md-input name="home-adress" v-model="engineer.home_address"></md-input>
		</md-field>

		<md-field>
			<label>Категорія</label>
				<md-select v-model="engineer.category">
					<md-option value="Інженер">Інженер</md-option>
					<md-option value="Технолог">Технолог</md-option>
					<md-option value="Технік">Технік</md-option>
				</md-select>
		</md-field>

		<md-field>
			<label>Дата прийняття на роботу</label>
			<md-input v-model="engineer.employment_date" ></md-input>
			<span class="md-helper-text">yyyy-mm-dd</span>
		</md-field>

		<md-field>
			<label>Цех</label>
			<md-select v-model="engineer.workshop_id" name="workshop_id">
				<md-option v-for="workshop in workshops" :value="workshop.id">{{ workshop.workshop_name }}</md-option>
			</md-select>
		</md-field>

		<md-button class="md-raised md-accent">Назад</md-button>
        <md-button class="md-raised md-primary" @click="createEngineer">Додати</md-button>
    </div>
</template>

<script>
	import axios from 'axios';

	export default {
		data: () => ({
			workshops: [],
			engineers: [],
			engineer: {},
			added: false,
		}),
		created() {
			this.fetchWorkshops();
		},
		methods: {
			fetchWorkshops() {
				axios.get('/workshop', this.workshop).then(response => {
					this.workshops = response.data.workshops;
				})
			},
			createEngineer() {
			    axios.post('/engineer', this.engineer).then(response => {
			        this.engineers.push(response.data.engineer);
			        this.added = true;
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
