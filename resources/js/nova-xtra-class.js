export default class NovaXtraClass {

    constructor() {
        this._errorIcon = '<svg class="fill-danger-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 9a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0v4a1 1 0 0 1-1 1zm0 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>';
        this._overlay = '<div class="xtra-container-overlay absolute pin bg-white z-20 opacity-75 flex items-center justify-center"><svg width="34" height="36" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg" class="spin fill-80 m-8"><path d="M20.12 20.455A12.184 12.184 0 0 1 11.5 24a12.18 12.18 0 0 1-9.333-4.319c4.772 3.933 11.88 3.687 16.36-.738a7.571 7.571 0 0 0 0-10.8c-3.018-2.982-7.912-2.982-10.931 0a3.245 3.245 0 0 0 0 4.628 3.342 3.342 0 0 0 4.685 0 1.114 1.114 0 0 1 1.561 0 1.082 1.082 0 0 1 0 1.543 5.57 5.57 0 0 1-7.808 0 5.408 5.408 0 0 1 0-7.714c3.881-3.834 10.174-3.834 14.055 0a9.734 9.734 0 0 1 .03 13.855zM4.472 5.057a7.571 7.571 0 0 0 0 10.8c3.018 2.982 7.912 2.982 10.931 0a3.245 3.245 0 0 0 0-4.628 3.342 3.342 0 0 0-4.685 0 1.114 1.114 0 0 1-1.561 0 1.082 1.082 0 0 1 0-1.543 5.57 5.57 0 0 1 7.808 0 5.408 5.408 0 0 1 0 7.714c-3.881 3.834-10.174 3.834-14.055 0a9.734 9.734 0 0 1-.015-13.87C5.096 1.35 8.138 0 11.5 0c3.75 0 7.105 1.68 9.333 4.319C16.06.386 8.953.632 4.473 5.057z" fill-rule="evenodd"></path></svg></div>';
        this._modalTpl =
            '<div class="xtra-modal-overlay fixed pin bg-80 z-20 opacity-75"></div>' +
            '<div class="xtra-modal-wrap relative flex justify-center z-20">' +
                '<div class="relative w-full bg-white rounded-lg shadow-lg overflow-hidden">' +
                    '<div class="xtra-modal-content"></div>' +
                    '<div class="xtra-modal-loader hidden absolute pin bg-white z-20 opacity-75 text-center">' +
                        '<svg width="69" height="72" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg" class="spin fill-80 m-8"><path d="M20.12 20.455A12.184 12.184 0 0 1 11.5 24a12.18 12.18 0 0 1-9.333-4.319c4.772 3.933 11.88 3.687 16.36-.738a7.571 7.571 0 0 0 0-10.8c-3.018-2.982-7.912-2.982-10.931 0a3.245 3.245 0 0 0 0 4.628 3.342 3.342 0 0 0 4.685 0 1.114 1.114 0 0 1 1.561 0 1.082 1.082 0 0 1 0 1.543 5.57 5.57 0 0 1-7.808 0 5.408 5.408 0 0 1 0-7.714c3.881-3.834 10.174-3.834 14.055 0a9.734 9.734 0 0 1 .03 13.855zM4.472 5.057a7.571 7.571 0 0 0 0 10.8c3.018 2.982 7.912 2.982 10.931 0a3.245 3.245 0 0 0 0-4.628 3.342 3.342 0 0 0-4.685 0 1.114 1.114 0 0 1-1.561 0 1.082 1.082 0 0 1 0-1.543 5.57 5.57 0 0 1 7.808 0 5.408 5.408 0 0 1 0 7.714c-3.881 3.834-10.174 3.834-14.055 0a9.734 9.734 0 0 1-.015-13.87C5.096 1.35 8.138 0 11.5 0c3.75 0 7.105 1.68 9.333 4.319C16.06.386 8.953.632 4.473 5.057z" fill-rule="evenodd"></path></svg>' +
                    '</div>' +
                    '<div class="xtra-modal-error hidden text-center text-white px-3 py-3 bg-danger-dark"></div>' +
                    '<div class="xtra-modal-close w-8 h-8 m-4 absolute pin-r pin-t text-60 hover:text-80"><svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg></div>' +
                '</div>' +
            '</div>';
        this.init();
    }

    init() {
        // inject modal
        this.modal = document.createElement('DIV');
        this.modal.classList.add('xtra-modal','hidden','modal','fixed','pin','z-50','overflow-x-hidden','overflow-y-auto','text-left');
        this.modal.innerHTML = this._modalTpl;
        document.body.appendChild(this.modal);

        this._modalContent = this.modal.querySelector('.xtra-modal-content');
        this._modalLoader = this.modal.querySelector('.xtra-modal-loader');
        this._modalOverlay = this.modal.querySelector('.xtra-modal-overlay');
        this._modalClose = this.modal.querySelector('.xtra-modal-close');
        this._modalError = this.modal.querySelector('.xtra-modal-error');

        this._modalOverlay.addEventListener("click", function(ev){ this.closeModal(); }.bind(this));
        this._modalClose.addEventListener("click", function(ev){ this.closeModal(); }.bind(this));
        /*document.addEventListener("click", function(ev){
            //var btn = [...document.querySelectorAll('.relationship-tabs-panel div div > button')].filter(el => (el.innerText && el.innerText.includes('Cabenet')));
            console.log('event', ev.target);
        });*/
    }

    loadingModal(status) {
        status ? this._modalLoader.classList.remove('hidden') : this._modalLoader.classList.add('hidden');
    }
    errorModal(error) {
        if (error) {
            this._modalError.classList.remove('hidden')
            //this._modalError.innerHTML = this._errorIcon + '<br>' + error
            this._modalError.innerHTML = error
        }
        else {
            this._modalError.classList.add('hidden')
            this._modalError.innerHTML = ''
        }
    }
    openModalSmall(routePath) {
        this.openModal(routePath, 'sm')
    }
    openModalLarge(routePath) {
        this.openModal(routePath, 'lg')
    }
    openModalFull(routePath) {
        this.openModal(routePath, 'full')
    }
    openModal(routePath, size) {
        this._modalContent.innerHTML = ''
        this.errorModal()
        this.modal.classList.remove('hidden','size-sm','size-lg','size-full')
        if (!size) size = 'md'
        this.modal.classList.add('size-'+size)
        if (routePath) {
            this.loadingModal(true)
            Nova.request()
                .get(`${routePath}`)
                // if html with status 200 is returned it does not trigger error so we do it
                .then(response => { return response.headers['content-type'] === 'application/json' ? response : Promise.reject(response); })
                .then(response => {
                    this._modalContent.innerHTML = response.data.html;
                })
                .catch( error => {
                    let message = this.alertResponseError(error)
                    this.errorModal(message)
                })
                .then( () => this.loadingModal(false) )
        }
    }
    closeModal() {
        this.modal.classList.add('hidden');
        this.loadingModal()
        this.errorModal()
    }

    /**
     * @deprecated
     * @param params routePath
     */
    submitModal (params) {
        this.submit(params)
    }
  /**
   * Submit to routePath, if modal is open treat like submitModal
   * @param params routePath
   */
    submit (params) {

        if (!params || !params.routePath) {
            Nova.error('Invalid submit route');
            return;
        }

        if (!this.modal.classList.contains('hidden')) {
          this.loadingModal(true)
          this.errorModal()
        }

        Nova.request()
            .post(`${params.routePath}`)
            .then(response => { return response.headers['content-type'] === 'application/json' ? response : Promise.reject(response); })
            .then(response => {
                if (response.data.onSuccess) {
                    this.forEach( response.data.onSuccess, function(value, prop, obj) {
                        if (value[0] && this[value[0]]) this[value[0]](value[1] || null);
                    }.bind(this));
                }
                if (response.data.message) {
                    Nova.success(response.data.message);
                }
            })
            .catch( error => {
                let message = this.alertResponseError(error)
                if (!this.modal.classList.contains('hidden')) this.errorModal(message)
            })
            .then( () => {
              if (!this.modal.classList.contains('hidden')) this.loadingModal(false)
            })
    }

    /**
     *
     * @param params routePath, selectors
     */
    fetchContent (params) {
        let container = document.querySelector(params.selectors)
        if (!container) Nova.error('Target container not found')
        let overlay = document.createElement('div')
        overlay.innerHTML = this._overlay
        overlay = overlay.firstChild
        container.append(overlay);
        Nova.request()
            .get(`${params.routePath}`)
            .then(response => { return response.headers['content-type'] === 'application/json' ? response : Promise.reject(response); })
            .then(response => {
                container.innerHTML = response.data.html;
            })
            .catch( error => {
                this.alertResponseError(error)
                overlay.remove();
            })
    }

    /**
     * Show Nova toaster success from response and return the message
     * @param response
     */
    alertResponseSuccess (response) {
        let message = (response.data && response.data.message) ? response.data.message : 'Success';
        Nova.success(message)
        return message;
    }
    /**
     * Show Nova toaster error message for request exception error object and return the message
     * @param error request object
     */
    alertResponseError (error) {
        // main error message
        let messages = [ (error.response && error.response.data.message) ? error.response.data.message : (error.message || 'Unknown error - please report')];
        // particular errors
        if (error.response && error.response.data.errors) {
            this.forEach(error.response.data.errors, function(value, prop, obj) { messages = messages.concat(value); });
        }
        let message = messages.join('<br>')
        Nova.error(message)
        return message
    }

    /**
     * Reload assynchronously page content for routes: index, detail, xtra page
     * @returns {Promise<void>}
     */
    async reloadCurrent() {
        let routeName = Nova.app.$route.name
        switch(routeName) {
            case 'index':
                var resourceName = Nova.app.$route.params.resourceName; // payments
                if(resourceName){
                    // find child in children array
                    var component = _.find(Nova.app.$children, {resourceName: resourceName});
                    if (component) {
                        component.getResources()
                        Nova.success(`Reloading component index`)
                    }
                }
                break
            case 'detail':
                var resourceName = Nova.app.$route.params.resourceName; // payments
                let resourceId = Nova.app.$route.params.resourceId; // 9
                if(resourceName && resourceId){
                    // find child in children array
                    var component = _.find(Nova.app.$children, {resourceName: resourceName, resourceId: resourceId});
                    if (component) {
                        component.getResource()
                        Nova.success(`Reloading component details`)
                    }
                }
                break
            case 'nova-xtra-page':
                var slug = Nova.app.$route.params.slug;
                if(slug){
                    // find child in children array
                    var component = _.find(Nova.app.$children, {slug: slug});
                    if (component) {
                        component.initializeComponent()
                        Nova.success(`Reloading component page`)
                    }
                }
                break
            default:
              Nova.app.$router.go(Nova.app.$router.currentRoute);
              Nova.success(`Reloading document`);
        }
    }

    async goToPage(slug, query) {
        Nova.app.$router.push({
          name: 'nova-xtra-page',
          params: {slug: slug},
          query: query || {}
        });
    }

    /**
     * A simple forEach() implementation for Arrays, Objects and NodeLists
     * @private
     * @param {Array|Object|NodeList} collection Collection of items to iterate
     * @param {Function} callback Callback function for each iteration
     * @param {Array|Object|NodeList} scope Object/NodeList/Array that forEach is iterating over (aka `this`)
     */
    forEach (collection, callback, scope) {
        if (Object.prototype.toString.call(collection) === '[object Object]') {
            for (var prop in collection) {
                if (Object.prototype.hasOwnProperty.call(collection, prop)) {
                    callback.call(scope, collection[prop], prop, collection);
                }
            }
        } else {
            for (var i = 0, len = collection.length; i < len; i++) {
                callback.call(scope, collection[i], i, collection);
            }
        }
    };

  /**
   * Expand-collapse next element sibling by toggling class 'hidden' on it
   * Toggler gets class 'collapsed' if the sibling is hidded
   * @param el - toggle element
   */
  toggleSibling(el) {
    if (el.nextElementSibling.classList.contains('hidden')) {
      el.nextElementSibling.classList.remove('hidden')
      el.classList.remove('collapsed');
    } else {
      el.nextElementSibling.classList.add('hidden')
      el.classList.add('collapsed');
    }
  }
}
