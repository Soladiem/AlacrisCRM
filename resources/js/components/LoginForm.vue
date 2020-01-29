<template>
    <div>
        <form @submit.prevent="doLogin">
            <input type="text"
                   name="email"
                   v-model="email"
                   placeholder="Username"
                   autocomplete="email"
                   class="form-input">

            <div class="password-wrapper">
                <input :type="passwordType"
                       v-model="password"
                       placeholder="Password"
                       class="form-input-password">
                <span class="eye-icon"
                      :class="[passwordIcon]"
                      @click="hidePassword = !hidePassword"></span>
            </div>


            <label class="form-check">Remember Me
                <input type="checkbox"
                       name="remember"
                       id="remember">
                <span class="form-check-mark"></span>
            </label>

            <button type="submit">
                Login
            </button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "LoginForm",
        data() {
            return {
                email: '',
                password: '',
                hidePassword: true
            }
        },
        computed: {
            passwordType() {
                return this.hidePassword ? 'password' : 'text'
            },
            passwordIcon() {
                return this.hidePassword ? 'eye-slash' : 'eye-no-slash'
            }
        },
        methods: {
            doLogin() {
                alert('Not implemented yet')
            }
        }
    }
</script>

<style scoped>
    .password-wrapper {
        display: flex;
        border: 1px solid rgba(255, 255, 255, 0.4);
        background-color: rgba(255, 255, 255, 0.2);
        width: 250px;
        border-radius: 3px;
        margin: 0 auto 10px auto;
    }

    .form-input-password {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: 0;
        padding: 10px 15px;
        width: 220px;
        border: none;
        background: transparent;
        font-size: 18px;
        color: #fff;
        -webkit-transition-duration: 0.25s;
        transition-duration: 0.25s;
        font-weight: 300;
    }

    .eye-icon {
        display: flex;
        align-self: center;
        width: 24px;
        height: 24px;
        margin-left: 2px;
        cursor: pointer;
        z-index: 2;
    }

    .eye-no-slash {
        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNmZmZmZmYiPjxwYXRoIGQ9Ik0xMi4wMSAyMGMtNS4wNjUgMC05LjU4Ni00LjIxMS0xMi4wMS04LjQyNCAyLjQxOC00LjEwMyA2Ljk0My03LjU3NiAxMi4wMS03LjU3NiA1LjEzNSAwIDkuNjM1IDMuNDUzIDExLjk5OSA3LjU2NC0yLjI0MSA0LjQzLTYuNzI2IDguNDM2LTExLjk5OSA4LjQzNnptLTEwLjg0Mi04LjQxNmMuODQzIDEuMzMxIDUuMDE4IDcuNDE2IDEwLjg0MiA3LjQxNiA2LjMwNSAwIDEwLjExMi02LjEwMyAxMC44NTEtNy40MDUtLjc3Mi0xLjE5OC00LjYwNi02LjU5NS0xMC44NTEtNi41OTUtNi4xMTYgMC0xMC4wMjUgNS4zNTUtMTAuODQyIDYuNTg0em0xMC44MzItNC41ODRjMi43NiAwIDUgMi4yNCA1IDVzLTIuMjQgNS01IDUtNS0yLjI0LTUtNSAyLjI0LTUgNS01em0wIDFjMi4yMDggMCA0IDEuNzkyIDQgNHMtMS43OTIgNC00IDQtNC0xLjc5Mi00LTQgMS43OTItNCA0LTR6Ii8+PC9zdmc+);
    }

    .eye-slash {
        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNmZmZmZmYiPjxwYXRoIGQ9Ik04LjEzNyAxNS4xNDdjLS43MS0uODU3LTEuMTQ2LTEuOTQ3LTEuMTQ2LTMuMTQ3IDAtMi43NiAyLjI0MS01IDUtNSAxLjIwMSAwIDIuMjkxLjQzNSAzLjE0OCAxLjE0NWwxLjg5Ny0xLjg5N2MtMS40NDEtLjczOC0zLjEyMi0xLjI0OC01LjAzNS0xLjI0OC02LjExNSAwLTEwLjAyNSA1LjM1NS0xMC44NDIgNi41ODQuNTI5LjgzNCAyLjM3OSAzLjUyNyA1LjExMyA1LjQyOGwxLjg2NS0xLjg2NXptNi4yOTQtNi4yOTRjLS42NzMtLjUzLTEuNTE1LS44NTMtMi40NC0uODUzLTIuMjA3IDAtNCAxLjc5Mi00IDQgMCAuOTIzLjMyNCAxLjc2NS44NTQgMi40MzlsNS41ODYtNS41ODZ6bTcuNTYtNi4xNDZsLTE5LjI5MiAxOS4yOTMtLjcwOC0uNzA3IDMuNTQ4LTMuNTQ4Yy0yLjI5OC0xLjYxMi00LjIzNC0zLjg4NS01LjU0OC02LjE2OSAyLjQxOC00LjEwMyA2Ljk0My03LjU3NiAxMi4wMS03LjU3NiAyLjA2NSAwIDQuMDIxLjU2NiA1Ljc4MiAxLjUwMWwzLjUwMS0zLjUwMS43MDcuNzA3em0tMi40NjUgMy44NzlsLS43MzQuNzM0YzIuMjM2IDEuNjE5IDMuNjI4IDMuNjA0IDQuMDYxIDQuMjc0LS43MzkgMS4zMDMtNC41NDYgNy40MDYtMTAuODUyIDcuNDA2LTEuNDI1IDAtMi43NDktLjM2OC0zLjk1MS0uOTM4bC0uNzQ4Ljc0OGMxLjQ3NS43NDIgMy4wNTcgMS4xOSA0LjY5OSAxLjE5IDUuMjc0IDAgOS43NTgtNC4wMDYgMTEuOTk5LTguNDM2LTEuMDg3LTEuODkxLTIuNjMtMy42MzctNC40NzQtNC45Nzh6bS0zLjUzNSA1LjQxNGMwLS41NTQtLjExMy0xLjA4Mi0uMzE3LTEuNTYybC43MzQtLjczNGMuMzYxLjY5LjU4MyAxLjQ2NC41ODMgMi4yOTYgMCAyLjc1OS0yLjI0IDUtNSA1LS44MzIgMC0xLjYwNC0uMjIzLTIuMjk1LS41ODNsLjczNC0uNzM1Yy40OC4yMDQgMS4wMDcuMzE4IDEuNTYxLjMxOCAyLjIwOCAwIDQtMS43OTIgNC00eiIvPjwvc3ZnPg==);
    }
</style>
