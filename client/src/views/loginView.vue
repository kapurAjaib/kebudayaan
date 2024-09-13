<script setup lang="ts">
import { ref } from 'vue';
const isPasswordVisible = ref(false);
const errors = ref({
    name: ref<string>(),
    email: ref<string>(),
    password: ref<string>()
});
const togglePassword = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
}
</script>
<template>
    <div class="lg:min-h-screen flex flex-column justify-content-center align-items-center pt-5">
        <h1 class="login-title text-center">
            Login
        </h1>
        <h2 class="login-subtitle">
            Welcome back, login to learn and explore more about Indonesian culture.
        </h2>
        <form class="login-form pb-6">
            <div class="input-group">
                <div class="login-label-input">email</div>
                <input class="login-input" placeholder="Enter your email" :class="{ 'is-error': errors.name }" />
                <div class="input-error-text" v-if="errors.email">
                    {{ errors.email }}
                </div>
            </div>
            <div class="input-group">
                <div class="login-label-input">password</div>
                <div class="input-password-wrapper">
                    <input class="login-input input-password" placeholder="Enter your password"
                        :type="isPasswordVisible ? 'text' : 'password'" :class="{ 'is-error': errors.name }" />
                    <button class="password-toggler" type="button" @click="togglePassword">
                        <i v-if="!isPasswordVisible" class="bi bi-eye ic-password "></i>
                        <i v-if="isPasswordVisible" class="bi bi-eye-slash ic-password"></i>
                    </button>
                </div>
                <div class="input-error-text" v-if="errors.password">
                    {{ errors.password }}
                </div>
            </div>
            <div>
                <button class="login-submit-btn">
                    Login
                </button>
            </div>
            <div class="text-center my-2">
                or
            </div>
            <div class="login-google">
                <img src="@/assets/image/icon/ic-color-google.svg" class="ic-register" />
                <div class="pl-2 register-google-text">
                    Login with google
                </div>
            </div>
            <div class="text-register-question">
                dont have account?
                <RouterLink to="/register" class="color-primary no-underline text-underline-hover">
                    Register now
                </RouterLink>
            </div>
        </form>
    </div>
</template>
<style scoped>
.login-title {
    font-size: 2rem;
    font-weight: 700;
    position: relative;
    padding-bottom: 15px;
    margin: 0;
    width: 100%;
    text-transform: uppercase;
}

.login-title::before {
    content: '';
    left: 50%;
    transform: translateX(-50%);
    max-width: 450px;
    width: 100%;
    position: absolute;
    bottom: 0;
    height: 1px;
    border: solid 1px #827f7f;
}

.login-subtitle {
    font-weight: inherit;
    font-size: 1rem;
    max-width: 420px;
    text-align: center;
}

.login-form {
    margin-top: 10px;
    max-width: 450px;
    width: 100%;
}

.login-label-input {
    font-weight: 600;
    margin-bottom: 3px;
    text-transform: capitalize;
}

.login-input {
    padding: 15px;
    width: 100%;
    font-family: poppins, sans-serif;
    border-radius: 8px;
    border: transparent;
    background-color: #F2F2F2;
}

.login-input:focus {
    outline: solid 2px rgb(57, 60, 160);
}

.login-input.is-error:focus {
    outline: solid 2px red;
}


.input-error-text {
    color: red;
    font-size: 0.9rem;
}

.input-group {
    margin-bottom: 17px;
}

.login-submit-btn {
    border: none;
    margin-top: 14px;
    background-color: #00A3FF;
    padding: 13px;
    font-weight: 700;
    color: white;
    border-radius: 8px;
    width: 100%;
}

.ic-register {
    width: 1.5rem;
    aspect-ratio: 1/1;
}

.login-google {
    display: flex;
    align-items: center;
    color: #00A3FF;
    text-transform: capitalize;
    justify-content: center;
    padding: 10px;
    border-radius: 8px;
    border: solid 2px #00A3FF;
    font-weight: 600;

}

.text-register-question {
    font-size: 0.86rem;
    margin-top: 5px;
    text-align: center;
}

.error-icon {
    margin-right: 1px;
    font-size: 1.1rem;
    vertical-align: middle;
}

.input-password-wrapper {
    position: relative;
}

.password-toggler {
    position: absolute;
    right: 12px;
    top: 50%;
    font-size: 1.3rem;
    transform: translateY(-50%);
    border: 0;
    background-color: transparent;
}

.input-password {
    padding-right: 34px;
}
</style>