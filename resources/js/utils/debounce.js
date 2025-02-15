export default function(func, delay) {
    let timer
    return function (...args) {
        clearTimeout(timer)
        console.log('cleared')
        timer = setTimeout(() => func.apply(this, args), delay)
    }
}
