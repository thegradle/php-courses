<template>
  <Form :style="bg">
    <h1>Реєстрація</h1>
    <Field name="name" :rules="isRequired" placeholder="Ім'я"/>
    <ErrorMessage name="name" />
    <Field name="surname" :rules="isRequired" placeholder="Прізвище"/>
    <ErrorMessage name="surname" />
    <input type="radio" name="sex" id="male" value="male" v-model="sex"><label for="male">Чоловік</label>
    <input type="radio" name="sex" id="female" value="female" v-model="sex"><label for="female">Жінка</label>
    <input type="radio" name="sex" id="other" value="other" v-model="sex" checked><label for="other">Інше</label>
    <Field name="tel" :rules="validateTel" placeholder="Телефонний номер"/>
    <ErrorMessage name="tel" />
    <Field name="login" :rules="validateLogin" placeholder="Логін"/>
    <ErrorMessage name="login" />
  </Form>
</template>
<script>
import { Field, Form, ErrorMessage } from 'vee-validate';
export default {
  components: {
    Field,
    Form,
    ErrorMessage,
  },
  data() {
    return {
      bg: '',
      sex: ''
    }
  },
  methods: {
    isRequired(value) {
      if (value && value.trim()) {
        return true;
      }
      return 'Це поле обов\'язкове!';
    },

    validateTel(value) {
      if (this.isRequired(value)) {
        if (/.*(\d{3})[ -]?(\d{3})[ -]?(\d{4})/.test(value)) {
          return true;
        }
        return 'Телефон введено не вірно!'
      }
    },

    validateLogin(value) {
      if (this.isRequired(value)) {
        if (/[A-Z]/.test(value) && /[_]/.test(value) && /\d\d\d$/.test(value)) {
          return true;
        }
        return 'Логін введено не вірно! Він має містити одну велику літеру, один символ підкреслення та 3 цифри наприкінці!'
      }
    }
  },
  watch: {
    sex(value) {
      if (value == 'male') {
        this.bg = 'background: blue; color: white;';
      } else if (value == 'female') {
        this.bg = 'background: pink';
      } else {
        this.bg = 'background: white';
      }
    }
  }
};
</script>
<style>
  input:not(input[type="radio"]), span {
    display: block;
    margin-bottom: 10px;
  }

  span {
    color: red;
  }
</style>