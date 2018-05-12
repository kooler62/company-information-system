<template>
	<div class="engineer-edit">
		<md-dialog-alert
		class="dialog-alert"
		:md-active.sync="added"
		md-title="Додано!"
		md-content="Ваші дані успішно оновлено" />

		<span class="md-display-1">Редагування</span>

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
			<label>Посада</label>
			<md-select v-model="engineer.position">
				<md-option value="">Не вказано</md-option>
				<md-option value="Майстер">Майстер</md-option>
				<md-option value="Начальник ділянки">Начальник ділянки</md-option>
				<md-option value="Начальник цеху">Начальник цеху</md-option>
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
		<md-button class="md-raised md-primary" @click="updateEngineer">Зберегти</md-button>
	</div>
</template>

<script>
	import axios from 'axios'
	export default {
        props: ['engineerId'],
	    data: () => ({
			added: false,
			workshops: [],
			engineer: {}
		}),
		created() {
	        this.fetchWorkshops();
	        this.fetchEngineer();
		},
		methods: {
	        fetchEngineer() {
	            axios.get('/engineer/' + this.engineerId).then(response => {
	                this.engineer = response.data;
				})
			},
	        updateEngineer() {
                axios.put('/engineer/' + this.engineerId, this.engineer);
				this.added = true;
			},
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
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

