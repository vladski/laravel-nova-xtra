import NovaXtra from './nova-xtra-class.js'

// Tooltips
// https://atomiks.github.io/tippyjs/v6/getting-started/
import tippy, {delegate} from 'tippy.js';
import 'tippy.js/dist/tippy.css'; // optional for styling
import 'tippy.js/themes/material.css';

Nova.booting((Vue, router, store) => {

  // these are not tool api routes
  router.addRoutes([
      {
          name: 'nova-xtra-page',
          path: '/xpage/:slug',
          component: require('./components/Tool'),
          props: true,
      }
  ])

    window.Nxtra = new NovaXtra();
    window.Nxtra.tippy = tippy;

    // initiate tooltip available on all elements with [data-tippy-content] attribute
    const instances = delegate('body', {
        target: '[data-tippy-content]',
        theme: 'translucent',
        allowHTML: true,
    });
})
