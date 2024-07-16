<?php

namespace App\Enum;

enum Permissions: string
{
    case PORTFOLIO_SHOW = 'portfolio.show';
    case PORTFOLIO_EDIT = 'portfolio.edit';
    case PORTFOLIO_ADD = 'portfolio.add';
    case PORTFOLIO_DELETE = 'portfolio.delete';

    case HOME_BANNER = 'home.banner';
    case HOME_WELCOME = 'home.welcome';
    case HOME_SERVICE = 'home.service';

    case SERVICE_SHOW = 'home.service.show';
    case SERVICE_ADD = 'home.service.add';
    case SERVICE_EDIT = 'home.service.edit';
    case SERVICE_DELETE = 'home.service.delete';

    case HOME_PROCESS = 'home.process';
    case PROCESS_SHOW = 'home.process.show';
    case PROCESS_ADD = 'home.process.add';
    case PROCESS_EDIT = 'home.process.edit';
    case PROCESS_DELETE = 'home.process.delete';

    case HOME_PORTFOLIO = 'home.portfolio';
    case ABOUT = 'about';

    case STATUS_SHOW = 'about.status.show';
    case STATUS_ADD = 'about.status.add';
    case STATUS_EDIT = 'about.status.edit';
    case STATUS_DELETE = 'about.status.delete';

    case SOCIAL_SHOW = 'about.social.show';
    case SOCIAL_ADD = 'about.social.add';
    case SOCIAL_EDIT = 'about.social.edit';
    case SOCIAL_DELETE = 'about.social.delete';

    case MESSAGE_SHOW = 'message.show';
    case MESSAGE_READ = 'message.read';
    case MESSAGE_READ_ALL = 'message.read.all';
    case MESSAGE_DELETE = 'message.delete';

    case CATEGORY_SHOW  = 'category.show';
    case CATEGORY_ADD  = 'category.add';
    case CATEGORY_EDIT  = 'category.edit';
    case CATEGORY_DELETE  = 'category.delete';

    case ROLE_SHOW  = 'role.show';
    case ROLE_ADD  = 'role.add';
    case ROLE_EDIT  = 'role.edit';
    case ROLE_DELETE  = 'role.delete';
    case ROLE_PERMISSION  = 'role.permission';

    case PERMISSION ='permission';
    case USER_SHOW ='user.show';
    case USER_EDIT ='user.edit';

    case MEDIA_SHOW = 'media.show';
    case MEDIA_ADD = 'media.add';
    case MEDIA_DELETE = 'media.delete';
}
