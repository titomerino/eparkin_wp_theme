import 'focus-visible'
import '../scss/index.scss'
import Flickity from './flickity'
import initAjaxQuery from './ajax-query'
import AOS from 'aos'
import SmoothScroll from 'smooth-scroll'

const root = document.documentElement

// Update <html> class to indicate JS is enabled
root.classList.remove('no-js')
root.classList.add('js')

// Polyfill Array.from if needed
if (!Array.from) Array.from = object => [].slice.call(object)

/// AOS animations
AOS.init()

// Activate AJAX query on the entire site
initAjaxQuery()

// Initialize SmoothScroll
var scrollPage = new SmoothScroll('a[href*="#"]', {
  offset: function (anchor, toggle) {
    return 0
  }
})

window.Flickity = Flickity
window.scrollPage = scrollPage
