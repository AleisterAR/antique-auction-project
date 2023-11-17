const sigInErrors = {
    'email': document.querySelector('#signIn-email-error'),
    'password': document.querySelector('#signIn-password-error')
}
const signInForm = document.querySelector('#signIn-form')

document.querySelector('#btn-sign').addEventListener('click', function (e) {
    Object.values(sigInErrors).forEach(v => {
        v.innerText = ''
    })
    const formData = new FormData(signInForm)
    axios.post('/login', formData).then(res => {
        if (res.data.isAdmin) {
            return window.location = '/admin'
        }
        window.location.reload()
    }).catch(error => {
        if (error.response.status === 422) {
            const validationErrors = error.response.data.errors
            for (let key in validationErrors) {
                if (key in sigInErrors) {
                    sigInErrors[key].innerText = validationErrors[key][0]
                }
            }
        }
    })
})


const signUpForm = document.querySelector('#user-register')
const signUpErrorKeys = ['user_name', 'email', 'password', 'password_confirmation', 'phone_number', 'address', 'full_name']
const signUpError = Object.fromEntries(signUpErrorKeys.map((k) => {
    return [k, document.querySelector(`#signUp-${k}-error`)]
}))

document.querySelector('#btn-sign-up').addEventListener('click', function (e) {
    e.preventDefault() /
        Object.values(signUpError).forEach(v => {
            v.innerText = ''
        })
    const formData = new FormData(signUpForm)
    axios.post('/register', formData).then(res => {
        bootstrap.Modal.getInstance(document.getElementById('Register')).hide()
        bootstrap.Modal.getInstance(document.getElementById('SignIn')).show()
    }).catch(error => {
        if (error.response.status === 422) {
            const validationErrors = error.response.data.errors
            for (let key in validationErrors) {
                if (key in signUpError) {
                    signUpError[key].innerText = validationErrors[key][0]
                }
            }
        }

        if(error.response.status === 500) {
            alert('Server Error')
        }
    })
})