<?php

declare(strict_types=1);
/**
 * This is an extension of hyperf
 * Name hyperf action
 *
 * @link     https://github.com/wayhood
 * @license  https://github.com/wayhood/hyperf-action
 */
namespace DeathSatan\BtApi;

class ApiList
{
    public static array $list = [
        'system_total' => '/system?action=GetSystemTotal', // 系统统计
        'get_disk_info' => '/system?action=GetDiskInfo', // 磁盘信息
        'get_network_info' => '/system?action=GetNetWork', // 网络信息
        'check_task_count' => '/ajax?action=GetTaskCount', // 监测是否有安装任务
        'update_panel' => '/ajax?action=UpdatePanel', // 检测面板更新以及是否更新面板
        'get_website_data' => '/data?action=getData&table=sites', // 获取网站列表
        'get_website_types' => '/site?action=get_site_types', // 获取网站分类
        'get_php_list_version' => '/site?action=GetPHPVersion',
        'add_site' => '/site?action=AddSite', // 创建网站
        'del_site' => '/site?action=DeleteSite', // 删除站点
        'stop_site' => '/site?action=SiteStop', // 停止站点运行
        'start_site' => '/site?action=SiteStart', // 启用站点
        'set_site_expire' => '/site?action=SetEdate', // 设置网站到期时间
        'set_site_remark' => '/data?action=setPs&table=sites', // 设置网站备注
        'get_site_back_list' => '/data?action=getData&table=backup', // 获取网站备份列表
        'add_site_back' => '/site?action=ToBackup', // 创建网站备份
        'del_site_back' => '/site?action=DelBackup', // 删除网站备份
        'get_site_domain_list' => '/data?action=getData&table=domain', // 获取网站域名列表
        'add_site_domain' => '/site?action=AddDomain', // 添加站点域名
        'del_site_domain' => '/site?action=DelDomain', // 删除站点域名
        'get_site_rewrite_list' => '/site?action=GetRewriteList', // 获取可选择的伪静态规则列
        'get_rewrite_conf' => '/files?action=GetFileBody', // 获取指定的伪静态规则内容
        'save_rewrite_conf' => '/files?action=SaveFileBody', // 保存伪静态规则内容
        'get_site_root_path' => '/data?action=getKey&table=sites&key=path', // 获取指定站点的根目录
        'get_site_user_ini' => '/site?action=GetDirUserINI', // 取回防跨站配置/运行目录/日志开关状态/可设置的运行目录列表/密码访问状态
        'set_site_user_ini' => '/site?action=SetDirUserINI', // 设置防跨站状态(自动取反)
        'set_is_open_log' => '/site?action=logsOpen', // 设置是否写访问日志
        'set_site_root_path' => '/site?action=SetPath', // 修改网站根目录
        'set_site_has_pwd' => '/site?action=SetHasPwd', // 设置是否密码访问
        'close_site_has_pwd' => '/site?action=CloseHasPwd', // 关闭密码访问
        'get_site_limit_net' => '/site?action=GetLimitNet', // 获取流量访问限制配置
        'close_site_limit_net' => '/site?action=CloseLimitNet', // 关闭流量访问限制
        'get_site_default_index' => '/site?action=GetIndex', // 获取默认首页文档信息
        'set_site_default_index' => '/site?action=SetIndex', // 设置默认首页文档信息
    ];

    public static function get($name)
    {
        if (! empty(self::$list[$name])) {
            return self::$list[$name];
        }
        throw new \Exception('Api未收录到系统内');
    }
}
