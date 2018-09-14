var HotspotsTour = {"id":"hotspots-tour","onEnd":"cookie","onClose":"cookie","steps":[{"title":"Welcome to Instituci\u00f3ns","content":"You can access the documentation & support forums at compojoom.com.<br \/>If you want to change this text or remove it completely navigate to your backend and turn it off in the options of the component.<br \/>Before you start exploring the locations, do you want to take a small tour?","target":"js-hs-main-app","placement":"top","xOffset":"center","zindex":9999,"arrowOffset":"center","onShow":"startEnd"},{"title":"The hotspots tab","content":"In the hotspots tab you'll see the locations in your current view. When you move the map, zoom in\/out the locations here will refresh.","target":"#js-tabs-region li[data-name='hotspots']","placement":"bottom","zindex":9999,"xOffset":"center","arrowOffset":"center","onShow":"hotspotsTab"},{"title":"The filters","content":"You can use the filters to show hotspots from specific category or the search box to show only locations matching a desired keyword.","target":"#js-hs-tab-filter-region","placement":"bottom","xOffset":"center","arrowOffset":"center","zindex":9999,"showPrevButton":true,"onShow":"hotspotsTab"},{"title":"Center & Fullscreen","content":"The center button will try to automatically find your location and it will center the map on it. Use the full screen button if you like to browse a bigger map.","target":".hs-buttons-map","placement":"left","yOffset":-20,"zindex":9999,"showPrevButton":true},{"title":"That's it!","content":"Now you know where the most important functions are located! Have fun using the map!","target":"#js-hs-main-app","placement":"top","zindex":9999,"showPrevButton":true,"xOffset":"center","arrowOffset":"center","onShow":"startEnd"}],"i18n":{"nextBtn":"Next","prevBtn":"Back","doneBtn":"Done"}};