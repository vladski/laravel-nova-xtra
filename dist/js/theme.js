(()=>{function e(e){return this.element=e,("string"==typeof this.element||this.element instanceof String)&&(this.element=document.querySelector(this.element)),this}e.prototype.exists=function(){return!!this.element},e.prototype.addClass=function(e){return this.element&&this.element.classList.add(e),this},e.prototype.parent=function(){return this.element&&this.element.parentElement?new e(this.element.parentElement):new e(null)},e.prototype.children=function(t){return this.element?new e(this.element.querySelector(t)):new e(null)},e.prototype.lastChild=function(){return this.element&&this.element.lastChild?new e(this.element.lastChild):new e(null)},e.prototype.closest=function(t){("string"==typeof t||t instanceof String)&&(t=[t]);var n=this.element;return t.forEach((function(e){n&&(n=n.closest(e))})),new e(n)},e.prototype.each=function(t,n){return this.element&&this.element.querySelectorAll(t).forEach((function(t){n(new e(t))})),this},document.addEventListener("DOMContentLoaded",(function(){var t=new e("div.content div.h-header").addClass("xtra-page-header");t.children("a").addClass("xtra-site-title"),t.children("input[dusk=global-search]").parent().parent().parent().addClass("xtra-global-search"),t.children(".dropdown-trigger").addClass("xtra-user-name"),new e(".w-sidebar").addClass("xtra-page-sidebar");var n,r,a=new e("div.content div[data-testid=content]").addClass("xtra-page-content");a.lastChild().addClass("xtra-page-footer"),n="div[data-testid=content]",(r=function(){var t=a.children("div[dusk$=index-component]");if(t.exists()){t.addClass("xtra-resource-index");var n=t.children("div[dusk=filter-selector]").addClass("xtra-filter-select").parent().addClass("xtra-index-actions-container");n.children("select[dusk=action-select]").parent().addClass("xtra-action-select"),n.children("div[dusk=delete-menu]").addClass("xtra-delete-menu");var r=n.children("div.dropdown-menu div").addClass("xtra-filters-menu");r.each("h3",(function(e){e.addClass("xtra-filter-title")})),r.each("div div.p-3",(function(e){e.addClass("xtra-filter-options")}))}var s=a.children("div[dusk$=detail-component]");s.exists()&&(s.addClass("xtra-resource-detail"),s.children("a[dusk=edit-resource-button]").parent().addClass("xtra-details-actions-container"));var d=new e("button[dusk=update-button], button[dusk=create-button]").closest("form");if(d.exists()&&(d.addClass("xtra-resource-form"),d.element.children))for(var l=0;l<d.element.children.length;l++)0===l?new e(d.element.children[l]).addClass("xtra-form-errors"):l===d.element.children.length-1?new e(d.element.children[l]).addClass("xtra-form-footer"):new e(d.element.children[l]).addClass("xtra-form-group");new e("button[dusk=update-button]").closest(["form",".card"]).parent().addClass("xtra-resource-edit"),new e("button[dusk=create-button]").closest(["form",".card"]).parent().addClass("xtra-resource-create"),document.querySelectorAll("div.card-panel").forEach((function(t){new e(t).parent().addClass("xtra-card-panel-container")}))})(),function(e,t){new MutationObserver(t).observe(document.querySelector(e),{childList:!0,subtree:!0})}(n,r)}),!1)})();