import{b as D,u as P,k as B}from"./index.ae2b6956.js";import{u as O}from"./PostTypes.dafa8837.js";import{A as L,T as j}from"./TitleDescription.aef7076b.js";import{C as q}from"./Card.109b77eb.js";import{C as w}from"./Tabs.b7a0989c.js";import{C as E}from"./Tooltip.73441134.js";import{a as F}from"./index.8c70464a.js";import"./translations.d159963e.js";import{c as p,F as b,J as h,v as m,o as r,k as S,l as a,a as o,G as I,x as u,t as n,C as _,q as N,T as R}from"./runtime-dom.esm-bundler.5c3c7d72.js";import{_ as V}from"./_plugin-vue_export-helper.eefbdd86.js";import{_ as e,s as T}from"./default-i18n.20001971.js";import"./helpers.c7282833.js";import"./constants.24c44c43.js";import"./JsonValues.3fcfec97.js";import"./RadioToggle.333e7750.js";import"./RobotsMeta.12cd00ab.js";import"./Checkbox.6db0b9ed.js";import"./Checkmark.e40641dd.js";import"./Row.df38a5f6.js";import"./SettingsRow.9f92e269.js";import"./Editor.cf7b5e9d.js";import"./isEqual.4981d166.js";import"./_baseIsEqual.44a599a3.js";import"./_getTag.805e37e1.js";import"./_baseClone.6a6e57fd.js";import"./_arrayEach.6af5abac.js";import"./Caret.d9cc70ba.js";import"./Tags.36fc4b35.js";import"./helpers.979ce6ae.js";import"./metabox.870afb5f.js";import"./cleanForSlug.c4a9e111.js";import"./toString.a2dfb892.js";import"./_baseTrim.11b89ad9.js";import"./_stringToArray.f9ddb970.js";import"./_baseSet.ab668497.js";import"./regex.8a6101c0.js";import"./GoogleSearchPreview.c38187f9.js";import"./Url.e2d414d9.js";import"./HtmlTagsEditor.48d4a46c.js";import"./UnfilteredHtml.e8ff6232.js";import"./Slide.39c07c03.js";import"./vue-router.2f910c93.js";import"./ProBadge.751e0b85.js";import"./Information.13e8cece.js";const s="all-in-one-seo-pack",z={setup(){const{getPostIconClass:l}=O();return{getPostIconClass:l,optionsStore:D(),rootStore:P(),settingsStore:B()}},components:{Advanced:L,CoreCard:q,CoreMainTabs:w,CoreTooltip:E,SvgCircleQuestionMark:F,TitleDescription:j},data(){return{internalDebounce:null,strings:{label:e("Label:",s),name:e("Slug:",s),postTypes:e("Post Types:",s),ctaButtonText:e("Unlock Custom Taxonomies",s),ctaDescription:T(e("%1$s %2$s lets you set the SEO title and description for custom taxonomies. You can also control all of the robots meta and other options just like the default category and tags taxonomies.",s),"AIOSEO","Pro"),ctaHeader:T(e("Custom Taxonomy Support is a %1$s Feature",s),"PRO")},tabs:[{slug:"title-description",name:e("Title & Description",s),access:"aioseo_search_appearance_settings",pro:!1},{slug:"advanced",name:e("Advanced",s),access:"aioseo_search_appearance_settings",pro:!1}]}},computed:{taxonomies(){return this.rootStore.aioseo.postData.taxonomies}},methods:{processChangeTab(l,g){this.internalDebounce||(this.internalDebounce=!0,this.settingsStore.changeTab({slug:`${l}SA`,value:g}),setTimeout(()=>{this.internalDebounce=!1},50))}}},M={class:"aioseo-search-appearance-taxonomies"},U={class:"aioseo-description"},G=o("br",null,null,-1),H=o("br",null,null,-1),J=o("br",null,null,-1);function Q(l,g,Y,i,c,f){const C=m("svg-circle-question-mark"),v=m("core-tooltip"),k=m("core-main-tabs"),A=m("core-card");return r(),p("div",M,[(r(!0),p(b,null,h(f.taxonomies,(t,x)=>(r(),S(A,{key:x,slug:`${t.name}SA`},{header:a(()=>[o("div",{class:I(["icon dashicons",i.getPostIconClass(t.icon)])},null,2),u(" "+n(t.label)+" ",1),_(v,{"z-index":"99999"},{tooltip:a(()=>[o("div",U,[u(n(c.strings.label)+" ",1),o("strong",null,n(t.label),1),G,u(" "+n(c.strings.name)+" ",1),o("strong",null,n(t.name),1),H,u(" "+n(c.strings.postTypes),1),J,o("ul",null,[(r(!0),p(b,null,h(t.postTypes,(d,y)=>(r(),p("li",{key:y},[o("strong",null,n(d),1)]))),128))])])]),default:a(()=>[_(C)]),_:2},1024)]),tabs:a(()=>[_(k,{tabs:c.tabs,showSaveButton:!1,active:i.settingsStore.settings.internalTabs[`${t.name}SA`],internal:"",onChanged:d=>f.processChangeTab(t.name,d)},null,8,["tabs","active","onChanged"])]),default:a(()=>[_(R,{name:"route-fade",mode:"out-in"},{default:a(()=>[(r(),S(N(i.settingsStore.settings.internalTabs[`${t.name}SA`]),{object:t,separator:i.optionsStore.options.searchAppearance.global.separator,options:i.optionsStore.dynamicOptions.searchAppearance.taxonomies[t.name],type:"taxonomies","show-bulk":!1},null,8,["object","separator","options"]))]),_:2},1024)]),_:2},1032,["slug"]))),128))])}const Rt=V(z,[["render",Q]]);export{Rt as default};