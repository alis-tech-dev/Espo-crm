"use strict";var h=Object.defineProperty;var E=(s,a,t)=>a in s?h(s,a,{enumerable:!0,configurable:!0,writable:!0,value:t}):s[a]=t;var n=(s,a,t)=>(E(s,typeof a!="symbol"?a+"":a,t),t);var d=(s,a,t)=>new Promise((e,i)=>{var c=o=>{try{l(t.next(o))}catch(r){i(r)}},u=o=>{try{l(t.throw(o))}catch(r){i(r)}},l=o=>o.done?e(o.value):Promise.resolve(o.value).then(c,u);l((t=t.apply(s,a)).next())});define(()=>{class s{constructor(t){n(this,"view");n(this,"scope",null);n(this,"scopeData",null);this.view=t,this.scope=this.view.scope,this.scopeData=this.view.getMetadata().get(["scopes",this.scope])}process(){this.scope&&this.scopeData&&this.view.getUser().isAdmin()&&this.addEditButtons()}addEditButtons(){var e;this.addEditEntityButton(),!!((e=this.scopeData)!=null&&e.layouts)&&(this.addEditLayoutButton(),this.addEditFiltersButton()),this.addEditLabelsButton(),this.addRefreshEntityButton()}addEditEntityButton(){var i;const t=!!((i=this.scopeData)!=null&&i.customizable);this.view.getConfig().get("editEntityEnabled")&&t&&this.view.addMenuItem("buttons",{name:"editEntity",labelTranslation:"Global.labels.Edit Entity",iconClass:"fas fa-tools fa-sm",link:"#Admin/entityManager/scope="+this.scope})}addEditLayoutButton(){if(!this.view.getConfig().get("editLayoutEnabled"))return;this.view.addMenuItem("buttons",{name:"editLayout",labelTranslation:"Global.labels.Edit Layout",iconClass:"fas fa-table fa-sm",action:"editLayout"});const e=Espo.Utils.lowerCaseFirst(this.view.name);this.view.actionEditLayout=()=>this.editLayout(e)}addEditFiltersButton(){this.view.getConfig().get("editFiltersEnabled")&&this.view.name==="List"&&(this.view.addMenuItem("buttons",{name:"editFilters",labelTranslation:"Global.labels.Edit Filters",iconClass:"fas fa-filter fa-sm",action:"editFilters"}),this.view.actionEditFilters=()=>this.editLayout("filters"))}addEditLabelsButton(){this.view.getConfig().get("editLabelsEnabled")&&(this.view.addMenuItem("buttons",{name:"editLabels",labelTranslation:"Global.labels.Edit Labels",iconClass:"fas fa-tags fa-sm",action:"editLabels"}),this.view.actionEditLabels=()=>this.editLabels())}addRefreshEntityButton(){!this.view.getConfig().get("refreshEntityEnabled")||!this.view.model||(this.view.addMenuItem("buttons",{name:"refreshEntity",labelTranslation:"Global.labels.Refresh Entity",iconClass:"fas fa-sync fa-sm",action:"refreshEntity"}),this.view.actionRefreshEntity=()=>this.refreshEntity())}editLayout(t){return d(this,null,function*(){const e=yield this.view.createView("edit-layout","autocrm:views/modals/edit-layout",{scope:this.scope,type:t});this.view.listenTo(e,"after:save",()=>{e.close(),Espo.Ui.success(this.view.translate("Saved"));const i=this.view.getRouter().getLast();this.view.getRouter().dispatch(i.controller,i.action,i.options)}),yield e.render()})}editLabels(){return d(this,null,function*(){const t=this.scope,e=this.view.getConfig().get("language"),i=`#Admin/labelManager/scope=${t}&language=${e}`;this.view.getRouter().navigate(i,{trigger:!0})})}refreshEntity(){return d(this,null,function*(){Espo.Ui.notify(this.view.translate(" ... ")),yield this.view.model.fetch(),Espo.Ui.success(this.view.translate("Done"))})}}return Object.assign(s.prototype,Backbone.Events),s});
