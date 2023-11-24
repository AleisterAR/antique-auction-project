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
        const user = res.data.user
        if (user.roles?.length && user.roles?.some(r => r.name === 'admin' || r.name === 'expert')) {
            return window.location.pathname = '/admin'
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

        if (error.response.status === 500) {
            alert('Server Error')
        }
    })
})

document.querySelector('#auction-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(e.target)
    axios.post('/auction', formData).then(res => {
        console.log(res)
    }).catch(error => {
        if(error.response.status === 422) {
            console.log(error.response.data)
        }
    })
})