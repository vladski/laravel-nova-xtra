/* credit to: https://github.com/gregoriohc/laravel-nova-theme-classify/ */
function xtra_theme_classes() {
  // Header
  var header = new Eler('div.content div.h-header')
    .addClass('xtra-page-header');

  header.children('a')
    .addClass('xtra-site-title');

  header.children('input[dusk=global-search]')
    .parent().parent().parent()
    .addClass('xtra-global-search');

  header.children('.dropdown-trigger') //
    .addClass('xtra-user-name');

  // Sidebar
  var sidebar = new Eler('.w-sidebar')
    .addClass('xtra-page-sidebar');

  // Content
  var content = new Eler('div.content div[data-testid=content]')
    .addClass('xtra-page-content');

  // Footer
  content.lastChild()
    .addClass('xtra-page-footer');

  runAndObserve('div[data-testid=content]', function () {
    // Resource index
    var resourceIndex = content.children('div[dusk$=index-component]');

    if (resourceIndex.exists()) {
      resourceIndex.addClass('xtra-resource-index');

      var indexActionsContainer = resourceIndex.children('div[dusk=filter-selector]')
        .addClass('xtra-filter-select')
        .parent()
        .addClass('xtra-index-actions-container');

      indexActionsContainer.children('select[dusk=action-select]').parent().addClass('xtra-action-select');
      indexActionsContainer.children('div[dusk=delete-menu]').addClass('xtra-delete-menu');

      var filtersMenu = indexActionsContainer.children('div.dropdown-menu div')
        .addClass('xtra-filters-menu');

      filtersMenu.each('h3', function(el) {
        el.addClass('xtra-filter-title');
      });

      filtersMenu.each('div div.p-3', function(el) {
        el.addClass('xtra-filter-options');
      });
    }

    // Resource detail
    var resourceDetail = content.children('div[dusk$=detail-component]');

    if (resourceDetail.exists()) {
      resourceDetail.addClass('xtra-resource-detail');

      resourceDetail.children('a[dusk=edit-resource-button]')
        .parent()
        .addClass('xtra-details-actions-container');
    }

    // Resource form
    var resourceForm = new Eler('button[dusk=update-button], button[dusk=create-button]').closest('form');

    if (resourceForm.exists()) {
      resourceForm.addClass('xtra-resource-form');

      if (resourceForm.element.children) {
        for (var i = 0; i < resourceForm.element.children.length; i++) {
          if (i === 0) {
            new Eler(resourceForm.element.children[i]).addClass('xtra-form-errors')
          } else if (i === resourceForm.element.children.length - 1) {
            new Eler(resourceForm.element.children[i]).addClass('xtra-form-footer')
          } else {
            new Eler(resourceForm.element.children[i]).addClass('xtra-form-group')
          }
        }
      }
    }

    // Resource edit
    new Eler('button[dusk=update-button]')
      .closest(['form', '.card'])
      .parent()
      .addClass('xtra-resource-edit');

    // Resource create
    new Eler('button[dusk=create-button]')
      .closest(['form', '.card'])
      .parent()
      .addClass('xtra-resource-create');

    // Cards
    var cardPanels = document.querySelectorAll('div.card-panel');
    cardPanels.forEach(function(cardPanel) {
      new Eler(cardPanel)
        .parent()
        .addClass('xtra-card-panel-container');
    });
  });
}

function Eler(el) {
  this.element = el;
  if (typeof this.element === 'string' || this.element instanceof String) {
    this.element = document.querySelector(this.element);
  }
  return this;
}

Eler.prototype.exists = function() {
  return !!this.element;
};

Eler.prototype.addClass = function(className) {
  if (this.element) {
    this.element.classList.add(className);
  }

  return this;
};

Eler.prototype.parent = function() {
  if (this.element && this.element.parentElement) {
    return new Eler(this.element.parentElement);
  }
  return new Eler(null);
};

Eler.prototype.children = function(selector) {
  if (this.element) {
    return new Eler(this.element.querySelector(selector));
  }
  return new Eler(null);
};

Eler.prototype.lastChild = function() {
  if (this.element && this.element.lastChild) {
    return new Eler(this.element.lastChild);
  }
  return new Eler(null);
};

Eler.prototype.closest = function(selectors) {
  if (typeof selectors === 'string' || selectors instanceof String) {
    selectors = [selectors];
  }

  var newElement = this.element;

  selectors.forEach(function(selector) {
    if (newElement) {
      newElement = newElement.closest(selector);
    }
  });

  return new Eler(newElement);
};

Eler.prototype.each = function(selector, callback) {
  if (this.element) {
    this.element.querySelectorAll(selector).forEach(function(el) {
      callback(new Eler(el));
    })
  }
  return this;
};

function observe(selector, callback) {
  new MutationObserver(callback).observe(document.querySelector(selector), {
    childList: true,
    subtree: true
  });
}

function runAndObserve(selector, callback) {
  callback();
  observe(selector, callback);
}

document.addEventListener("DOMContentLoaded", xtra_theme_classes, false);
