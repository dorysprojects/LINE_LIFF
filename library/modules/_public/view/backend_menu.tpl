<aside class="main-sidebar">
  {#assign var="_backend_" value=$__DOMAIN|cat:'_backend'#}
  {#assign var="_backend_value" value=$smarty.session.$_backend_#}
  {#assign var="_authority" value=$_backend_value.subject.authority#}
  <section class="sidebar">
    <div class="user-panel {#if !$_backend_value.subject.img0 || !$_backend_value.propertyA#}hide{#/if#}">
      <div class="pull-left image">
        <img {#if $_backend_value.subject.img0#}src="{#$__WEB_UPLOAD#}/image/{#$_backend_value.subject.img0#}"{#/if#} class="img-circle" alt="{#$_backend_value.propertyA#}">
      </div>
      <div class="pull-left info">
        <p>{#$_backend_value.propertyA#}</p>
        <!--<a href="#"><i class="fa fa-bookmark" text-success"></i>Group</a>-->
      </div>
    </div>
    <form action="#" method="get" class="sidebar-form hide">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
        {#if $_authority#}
          <li id="SideBar_Platform" class="header">平台管理</li>
            {#if $_authority.LineMember.index === 'on'#}
              <li class="SideBar_Platform {#if $_Module=='LineMember'#}active{#/if#}"><a href="/be/LineMember"><i class="fa fa-fw fa-group"></i> <span>好友列表</span></a></li>
            {#/if#}
            {#if $_authority.Tag.index === 'on'#}
              <li class="SideBar_Platform {#if $_Module=='Tag'#}active{#/if#}"><a href="/be/Tag"><i class="fa fa-fw fa-tags"></i> <span>標籤管理</span></a></li>
            {#/if#}
            {#if $_authority.CrontabMsg.index === 'on'#}
              <li class="SideBar_Platform {#if $_Module=='CrontabMsg'#}active{#/if#}"><a href="/be/CrontabMsg"><i class="fa fa-fw fa-send"></i> <span>投稿內容一覽</span></a></li>
            {#/if#}
            {#if $_authority.KeyWordMsg.index === 'on'#}
              <li class="SideBar_Platform {#if $_Module=='KeyWordMsg'#}active{#/if#}"><a href="/be/KeyWordMsg"><i class="fa fa-fw fa-key"></i> <span>關鍵字回覆</span></a></li>
            {#/if#}
          
          <li id="SideBar_FB" class="header">
            <i class="fa fa-facebook-square" style="font-size: 20px;color: #4267b2;"></i> 
            Messenger管理
          </li>
              {#if $_authority.CustomerService.index==='on' && $_authority.CustomerService.facebook==='on'#}
                <li class="SideBar_FB SideBar_FacebookChat {#if $_Module=='CustomerService'#}active{#/if#}"><a href="/be/CustomerService/index/ChatRoom/facebook" target="_blank"><i class="fa fa-fw fa-headphones"></i> <span>線上客服</span><i class="fa fa-circle" style="display: none;float: right;color: #4267b2;"></i></a></li>
              {#/if#}
              {#if $_authority.FB_Template.index==='on' || $_authority.FB_ListTemplate.index==='on' || $_authority.FB_BtnTemplate.index==='on' || $_authority.FB_SocialTemplate.index==='on' || $_authority.FB_MediaTemplate.index==='on' || $_authority.FB_ReceiptTemplate.index==='on' || $_authority.FB_AirlineTemplate.index==='on' || $_authority.FB_ProductTemplate.index==='on'#}
                <li class="SideBar_FB treeview {#if $_Module=='FB_Template' || $_Module=='FB_ListTemplate' || $_Module=='FB_BtnTemplate' || $_Module=='FB_SocialTemplate' || $_Module=='FB_MediaTemplate' || $_Module=='FB_ReceiptTemplate' || $_Module=='FB_AirlineTemplate' || $_Module=='FB_ProductTemplate' || ($_Module=='QuicklyReply'&&$__TYPE=='facebook')#}active{#/if#}">
                  <a>
                    <i class="fa fa-comment-o"></i> 
                    <span>訊息設定</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    {#if $_authority.FB_Template.index === 'on'#}
                      <li class="{#if $_Module=='FB_Template'#}active{#/if#}"><a href="/be/FB_Template"><i class="fa fa-fw fa-columns"></i> <span>一般型卡片</span></a></li>
                    {#/if#}
                    {#if $_authority.FB_ListTemplate.index === 'on'#}
                      <!--<li class="{#if $_Module=='FB_ListTemplate'#}active{#/if#}"><a href="/be/FB_ListTemplate"><i class="fa fa-fw fa-list-ul"></i> <span>清單卡片(已停用)</span></a></li>-->
                    {#/if#}
                    {#if $_authority.FB_BtnTemplate.index === 'on'#}
                      <li class="{#if $_Module=='FB_BtnTemplate'#}active{#/if#}"><a href="/be/FB_BtnTemplate"><i class="fa fa-fw fa-toggle-right"></i> <span>按鈕卡片</span></a></li>
                    {#/if#}
                    {#if $_authority.FB_SocialTemplate.index === 'on'#}
                      <!--<li class="{#if $_Module=='FB_SocialTemplate'#}active{#/if#}"><a href="/be/FB_SocialTemplate"><i class="fa fa-fw fa-user"></i> <span>社交卡片(已停用)</span></a></li>-->
                    {#/if#}
                    {#if $_authority.FB_MediaTemplate.index === 'on'#}
                      <li class="{#if $_Module=='FB_MediaTemplate'#}active{#/if#}"><a href="/be/FB_MediaTemplate"><i class="fa fa-fw fa-photo"></i> <span>媒體卡片</span></a></li>
                    {#/if#}
                    {#if $_authority.FB_ReceiptTemplate.index === 'on'#}
                      <li class="{#if $_Module=='FB_ReceiptTemplate'#}active{#/if#}"><a href="/be/FB_ReceiptTemplate"><i class="fa fa-fw fa-file-text"></i> <span>收據卡片</span></a></li>
                    {#/if#}
                    {#if $_authority.FB_AirlineTemplate.index === 'on'#}
                      <!--<li class="{#if $_Module=='FB_AirlineTemplate'#}active{#/if#}"><a href="/be/FB_AirlineTemplate"><i class="fa fa-fw fa-plane"></i> <span>航班卡片(暫不開發)</span></a></li>-->
                    {#/if#}
                    {#if $_authority.FB_ProductTemplate.index === 'on'#}
                      <!--<li class="{#if $_Module=='FB_ProductTemplate'#}active{#/if#}"><a href="/be/FB_ProductTemplate"><i class="fa fa-fw fa-cart-plus"></i> <span>產品卡片(暫不開發)</span></a></li>-->
                    {#/if#}
                    {#if $_authority.QuicklyReply.index === 'on'#}
                      <li class="{#if $_Module=='QuicklyReply' && $__TYPE=='facebook'#}active{#/if#}"><a href="/be/QuicklyReply/index/type/facebook"><i class="fa fa-fw fa-commenting"></i> <span>快捷語</span></a></li>
                    {#/if#}
                  </ul>
                </li>
              {#/if#}
              
          <li id="SideBar_Line" class="header">
            <svg style="width: 20px;vertical-align: bottom;color: #00b900;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="line" class="svg-inline--fa fa-line fa-w-14" role="img" viewBox="0 0 448 512">
              <path fill="currentColor" d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"/>
            </svg> 
            Line@管理
          </li>
              {#if $_authority.CustomerService.index==='on' && $_authority.CustomerService.line==='on'#}
                <li class="SideBar_Line SideBar_LineChat {#if $_Module=='CustomerService'#}active{#/if#}"><a href="/be/CustomerService/index/ChatRoom/line" target="_blank"><i class="fa fa-fw fa-headphones"></i> <span>線上客服</span><i class="fa fa-circle" style="display: none;float: right;color: #00b900;"></i></a></li>
              {#/if#}
              {#if $_authority.ImageMap.index==='on' || $_authority.LineTemplate.index==='on' || $_authority.ImageCarousel.index==='on' || $_authority.CustomMessage.index==='on'#}
                <li class="SideBar_Line treeview {#if $_Module=='ImageMap' || $_Module=='LineTemplate' || $_Module=='ImageCarousel' || $_Module=='CustomMessage' || ($_Module=='QuicklyReply'&&($__TYPE==''||$__TYPE=='line'))#}active{#/if#}">
                  <a>
                    <i class="fa fa-comment-o"></i>
                    <span>訊息設定</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    {#if $_authority.ImageMap.index === 'on'#}
                      <li class="{#if $_Module=='ImageMap'#}active{#/if#}"><a href="/be/ImageMap"><i class="fa fa-fw fa-film"></i> <span>圖文訊息</span></a></li>
                    {#/if#}
                    {#if $_authority.LineTemplate.index === 'on'#}
                      <li class="{#if $_Module=='LineTemplate'#}active{#/if#}"><a href="/be/LineTemplate"><i class="fa fa-fw fa-columns"></i> <span>卡片式選單</span></a></li>
                    {#/if#}
                    {#if $_authority.ImageCarousel.index === 'on'#}
                      <li class="{#if $_Module=='ImageCarousel'#}active{#/if#}"><a href="/be/ImageCarousel"><i class="fa fa-fw fa-picture-o"></i> <span>大圖選單</span></a></li>
                    {#/if#}
                    {#if $_authority.CustomMessage.index === 'on'#}
                      <li class="{#if $_Module=='CustomMessage'#}active{#/if#}"><a href="/be/CustomMessage"><i class="fa fa-fw fa-code"></i> <span>自訂訊息</span></a></li>
                    {#/if#}
                    {#if $_authority.QuicklyReply.index === 'on'#}
                      <li class="{#if $_Module=='QuicklyReply' && ($__TYPE==''||$__TYPE=='line')#}active{#/if#}"><a href="/be/QuicklyReply"><i class="fa fa-fw fa-commenting"></i> <span>快捷語</span></a></li>
                    {#/if#}
                  </ul>
                </li>
              {#/if#}
              {#if $_authority.SystemMessage.index === 'on'#}
                <li class="SideBar_Line treeview {#if $_Module=='SystemMessage'#}active{#/if#}">
                  <a>
                    <i class="fa fa-comments"></i> <span>各情境回應設定</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    {#if $_authority.SystemMessage.FollowMsg === 'on'#}
                      <li class="{#if $_Action=='FollowMsg'#}active{#/if#}"><a href="/be/SystemMessage/FollowMsg"><i class="fa fa-fw fa-child"></i> <span>歡迎訊息</span></a></li>
                    {#/if#}
                    {#if $_authority.SystemMessage.AutoMsg === 'on'#}
                      <li class="{#if $_Action=='AutoMsg'#}active{#/if#}"><a href="/be/SystemMessage/AutoMsg"><i class="fa fa-fw fa-android"></i> <span>自動回覆訊息</span></a></li>
                    {#/if#}
                    {#if $_authority.SystemMessage.StickerMsg === 'on'#}
                      <li class="{#if $_Action=='StickerMsg'#}active{#/if#}"><a href="/be/SystemMessage/StickerMsg"><i class="fa fa-fw fa-smile-o"></i> <span>貼圖回覆訊息</span></a></li>
                    {#/if#}
                    {#if $_authority.SystemMessage.VideoPlayCompleteMsg === 'on'#}
                      <li class="{#if $_Action=='VideoPlayCompleteMsg'#}active{#/if#}"><a href="/be/SystemMessage/VideoPlayCompleteMsg"><i class="fa fa-fw fa-video-camera"></i> <span>影片播放完畢訊息</span></a></li>
                    {#/if#}
                    {#if $_authority.SystemMessage.NotifyMsg === 'on'#}
                      <li class="{#if $_Action=='NotifyMsg'#}active{#/if#}"><a href="/be/SystemMessage/NotifyMsg"><i class="fa fa-fw fa-bell-o"></i> <span>Notify連動訊息</span></a></li>
                    {#/if#}
                  </ul>
                </li>
              {#/if#}
              {#if $_authority.QARobot.index === 'on' || $_authority.CardRobot.index==='on' || $_authority.GroupRobot.index==='on'#}
                <li class="SideBar_Line treeview {#if $_Module=='QARobot' || $_Module=='CardRobot' || $_Module=='GroupRobot'#}active{#/if#}">
                  <a>
                    <i class="fa fa-android"></i> <span>機器人</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    {#if $_authority.QARobot.index === 'on'#}
                      <li class="{#if $_Module=='QARobot'#}active{#/if#}"><a href="/be/QARobot"><i class="fa fa-fw fa-pencil-square-o"></i> <span>問卷機器人</span></a></li>
                    {#/if#}
                    {#if $_authority.CardRobot.index === 'on'#}
                      <li class="{#if $_Module=='CardRobot'#}active{#/if#}"><a href="/be/CardRobot"><i class="fa fa-fw fa-credit-card"></i> <span>製卡機器人</span></a></li>
                    {#/if#}
                    {#if $_authority.GroupRobot.index === 'on'#}
                      <li class="{#if $_Module=='GroupRobot'#}active{#/if#}"><a href="/be/GroupRobot"><i class="fa fa-fw fa-user-plus"></i> <span>揪團機器人</span></a></li>
                    {#/if#}
                  </ul>
                </li>
              {#/if#}
              {#if $_authority.UrlMsg.index === 'on'#}
                <li class="SideBar_Line {#if $_Module=='UrlMsg'#}active{#/if#}"><a href="/be/UrlMsg"><i class="fa fa-fw fa-link"></i> <span>連結訊息</span></a></li>
              {#/if#}
              {#if $_authority.RichMenu.index === 'on'#}
                <li class="SideBar_Line {#if $_Module=='RichMenu'#}active{#/if#}"><a href="/be/RichMenu"><i class="fa fa-fw fa-th-large"></i> <span>主選單</span></a></li>
              {#/if#}
              {#if $_authority.liff.index === 'on'#}
                <li class="SideBar_Line {#if $_Module=='liff'#}active{#/if#}"><a href="/be/liff"><i class="fa fa-fw fa-bars"></i> <span>liff 列表</span></a></li>
              {#/if#}
        {#/if#}

        {#if $_authority.Payment#}
        <li id="SideBar_System" class="header">訂單管理</li>
          {#if $_authority.Payment.index === 'on'#}
            <li class="SideBar_System {#if $_Module=='Payment'#}active{#/if#}"><a href="/be/Payment"><i class="fa fa-fw fa-credit-card"></i> <span>付款方式</span></a></li>
          {#/if#}
        {#/if#}
        
        {#if $_authority.Authority#}
          <li id="SideBar_System" class="header">系統管理</li>
            {#if $_authority.Parameter.index === 'on'#}
              <li class="SideBar_System {#if $_Module=='Parameter'#}active{#/if#}"><a href="/be/Parameter"><i class="fa fa-fw fa-info-circle"></i> <span>參數管理</span></a></li>
            {#/if#}
            {#if $_authority.GoldFlow.index === 'on'#}
              <li class="SideBar_System {#if $_Module=='GoldFlow'#}active{#/if#}"><a href="/be/GoldFlow"><i class="fa fa-fw fa-money"></i> <span>金流管理</span></a></li>
            {#/if#}
            {#if $_authority.Authority.index === 'on'#}
              <li class="SideBar_System {#if $_Module=='Authority'#}active{#/if#}"><a href="/be/Authority"><i class="fa fa-fw fa-cogs"></i> <span>權限管理</span></a></li>
            {#/if#}
            {#if $_authority.debug.index === 'on'#}
              <li class="SideBar_System {#if $_Module=='debug'#}active{#/if#}"><a href="/be/debug"><i class="fa fa-circle-o text-red"></i> <span>Debug</span></a></li>
            {#/if#}
            
          <li id="SideBar_Project" class="header">專案列表</li>
            <li class="SideBar_Project"><a target="_blank" href="https://liff.line.me/{#$__LIFF_STICKER__ID#}"><i class="fa fa-fw fa-paint-brush"></i> <span>手畫貼圖</span></a></li>
            <li class="SideBar_Project"><a target="_blank" href="/ft/flex-simulator"><i class="fa fa-fw fa-rocket"></i> <span>Flex訊息模擬器</span></a></li>
            <li class="SideBar_Project"><a target="_blank" href="/ft/LotteryGame"><i class="fa fa-fw fa-gift"></i> <span>抽獎</span></a></li><!-- fa-gamepad -->
            <li class="SideBar_Project"><a target="_blank" href="/ft/SuperRatio"><i class="fa fa-fw fa-hand-paper-o"></i> <span>超級比一比</span></a></li>
            <li class="SideBar_Project"><a target="_blank" href="/ft/LotteryHistory"><i class="fa fa-fw fa-dollar"></i> <span>樂透分析</span></a></li>
            <li class="SideBar_Project"><a target="_blank" href="/ft/Call"><i class="fa fa-fw fa-phone"></i> <span>即時聊天室</span></a></li>
            <li class="SideBar_Project"><a target="_blank" href="/ft/GrabTickets"><i class="fa fa-fw fa-ticket"></i> <span>搶票系統</span></a></li>
            <li class="SideBar_Project"><a target="_blank" href="/ft/analytics"><i class="fa fa-fw fa-pie-chart"></i> <span>聊天分析</span></a></li>
        {#/if#}
    </ul>
  </section>
</aside>

{#include file=$__PublicView|cat:'CustomerService.tpl'#}