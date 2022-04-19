<template>
  <Form>
    <h1>Реєстрація</h1>
    <Field name="name" :rules="isRequired" placeholder="Ім'я"/>
    <ErrorMessage name="name" />
    <Field name="surname" :rules="isRequired" placeholder="Прізвище"/>
    <ErrorMessage name="surname" />
    <Field name="tel" :rules="validateTel" placeholder="Телефонний номер"/>
    <ErrorMessage name="tel" />
    <Field name="login" :rules="isRequired" placeholder="Логін"/>
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
    }
  },
};
</script>
<style>
  input, span {
    display: block;
    margin-bottom: 10px;
  }

  span {
    color: red;
  }
</style>