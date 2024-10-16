"use strict";var i=(s,e,t)=>new Promise((o,l)=>{var c=a=>{try{r(t.next(a))}catch(n){l(n)}},p=a=>{try{r(t.throw(a))}catch(n){l(n)}},r=a=>a.done?o(a.value):Promise.resolve(a.value).then(c,p);r((t=t.apply(s,e)).next())});define(["views/record/detail"],function(s){return s.extend({stickButtonsFormBottomSelector:'.panel[data-name="items"]',setup:function(){return i(this,null,function*(){s.prototype.setup.call(this),(yield this.checkVisibility())&&(this.addButton({name:"approveVacationRequest",label:"Approve Vacation Request",html:this.translate("approveVacationRequest","labels","VacationRequestApproval")}),this.dropdownItemList=this.dropdownItemList.filter(e=>e.name!=="approve"))})},checkVisibility:function(){return i(this,null,function*(){const e=this.getUser();yield e.fetch(),this.model.trigger("sync"),console.log(JSON.stringify(e.attributes.rolesIds));const t=e.get("rolesIds"),o=this.getConfig().get("humanResourceApprovalRoleId");return!!t.includes(o)})},actionApproveVacationRequest:function(){return i(this,null,function*(){const e=yield this.createView("dialog","human-resources:views/modals/approval-modal",{entityType:this.entityType,id:this.attributes.id});this.listenToOnce(e,"done",t=>{switch(t){case"Approved":Espo.Ui.success(this.translate(t,"labels","VacationRequestApproval"));break;case"Rejected":Espo.Ui.error(this.translate(t,"labels","VacationRequestApproval"));break;case"Returned":Espo.Ui.warning(this.translate(t,"labels","VacationRequestApproval"));break;default:throw new Error(this.translate("Unknown response","labels","VacationRequestApproval"))}this.model.fetch(),this.model.trigger("update-all")}),yield e.render()})}})});
