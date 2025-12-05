# 方法三：修改PHP代码详细指南

## ⚠️ 重要提醒

**此方法会修改源代码文件，有以下风险：**
- 系统升级时修改会丢失
- 需要在每次升级后重新应用修改
- 不推荐用于生产环境

**推荐使用方法一（后台配置）或方法二（修改数据库）。**

---

## 需要修改的文件

**文件路径**：`Y_php/apps/common/HomeController.php`

---

## 修改步骤

### 第一处修改：强制HTTPS重定向（第32-35行）

**原代码：**
```php
// 自动跳转HTTPS
if (! is_https() && ! ! $tohttps = Config::get('to_https')) {
    //header("Location: http://" . $_SERVER['HTTP_HOST'], true, 301);
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true,301);
}
```

**修改为：**
```php
// 自动跳转HTTPS（跳过localhost和本地开发环境）
if (! is_https() && ! ! $tohttps = Config::get('to_https')) {
    // 检查是否为本地开发环境
    $host = $_SERVER['HTTP_HOST'];
    $is_local = (
        $host == 'localhost' || 
        $host == '127.0.0.1' || 
        strpos($host, 'localhost:') === 0 ||
        strpos($host, '127.0.0.1:') === 0 ||
        preg_match('/\.local$/i', $host) ||
        preg_match('/\.test$/i', $host)
    );
    
    // 仅在非本地环境时执行重定向
    if (!$is_local) {
        //header("Location: http://" . $_SERVER['HTTP_HOST'], true, 301);
        header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true,301);
    }
}
```

---

### 第二处修改：强制主域名跳转（第37-47行）

**原代码：**
```php
// 自动跳转主域名
if (! ($this->config('wap_domain') && is_mobile()) && (! ! $main_domain = Config::get('main_domain')) && (! ! $to_main_domain = Config::get('to_main_domain'))) {
    if (! preg_match('{^' . $main_domain . '$}i', get_http_host(true))) {
        if (is_https()) {
            header("Location: https://" . $main_domain . ':' . $_SERVER['SERVER_PORT'], true, 301);
        } else {
            header("Location: http://" . $main_domain . ':' . $_SERVER['SERVER_PORT'], true, 301);
        }
        exit();
    }
}
```

**修改为：**
```php
// 自动跳转主域名（跳过localhost和本地开发环境）
if (! ($this->config('wap_domain') && is_mobile()) && (! ! $main_domain = Config::get('main_domain')) && (! ! $to_main_domain = Config::get('to_main_domain'))) {
    $current_host = get_http_host(true);
    
    // 检查是否为本地开发环境
    $is_local = (
        $current_host == 'localhost' || 
        $current_host == '127.0.0.1' || 
        strpos($current_host, 'localhost:') === 0 ||
        strpos($current_host, '127.0.0.1:') === 0 ||
        preg_match('/\.local$/i', $current_host) ||
        preg_match('/\.test$/i', $current_host)
    );
    
    // 仅在非本地环境且域名不匹配时执行重定向
    if (!$is_local && ! preg_match('{^' . $main_domain . '$}i', $current_host)) {
        if (is_https()) {
            header("Location: https://" . $main_domain . ':' . $_SERVER['SERVER_PORT'], true, 301);
        } else {
            header("Location: http://" . $main_domain . ':' . $_SERVER['SERVER_PORT'], true, 301);
        }
        exit();
    }
}
```

---

### 第三处修改：手机域名自动跳转（第92-101行）

**原代码：**
```php
// 手机自适应主题
if ($this->config('open_wap')) {
    if ($this->config('wap_domain') && $this->config('wap_domain') == get_http_host()) {
        $this->setTheme(get_theme() . '/wap'); // 已绑域名并且一致则自动手机版本
    } elseif (is_mobile() && $this->config('wap_domain') && $this->config('wap_domain') != get_http_host()) {
        if (is_https()) {
            $pre = 'https://';
        } else {
            $pre = 'http://';
        }
        header('Location:' . $pre . $this->config('wap_domain') . URL, true, 302); // 手机访问并且绑定了域名，但是访问域名不一致则跳转
```

**修改为：**
```php
// 手机自适应主题（跳过localhost和本地开发环境）
if ($this->config('open_wap')) {
    $current_host = get_http_host();
    
    // 检查是否为本地开发环境
    $is_local = (
        $current_host == 'localhost' || 
        $current_host == '127.0.0.1' || 
        strpos($current_host, 'localhost:') === 0 ||
        strpos($current_host, '127.0.0.1:') === 0 ||
        preg_match('/\.local$/i', $current_host) ||
        preg_match('/\.test$/i', $current_host)
    );
    
    if ($this->config('wap_domain') && $this->config('wap_domain') == $current_host) {
        $this->setTheme(get_theme() . '/wap'); // 已绑域名并且一致则自动手机版本
    } elseif (!$is_local && is_mobile() && $this->config('wap_domain') && $this->config('wap_domain') != $current_host) {
        if (is_https()) {
            $pre = 'https://';
        } else {
            $pre = 'http://';
        }
        header('Location:' . $pre . $this->config('wap_domain') . URL, true, 302); // 手机访问并且绑定了域名，但是访问域名不一致则跳转
```

---

## 完整的修改后代码

将以下代码替换到 `apps/common/HomeController.php` 的 `__construct()` 方法中：

```php
public function __construct()
{
    // 自动缓存基础信息
    cache_config();
    
    // 从配置文件读取cmsname参数来设置系统名称
    define("CMSNAME", $this->config("cmsname") ?: 'PbootCMS');

    // 站点关闭检测
    if (! ! $close_site = Config::get('close_site')) {
        $close_site_note = Config::get('close_site_note');
        error($close_site_note ?: '本站维护中，请稍后再访问，带来不便，敬请谅解！');
    }

    // ====== 修改开始 ======
    
    // 自动跳转HTTPS（跳过localhost和本地开发环境）
    if (! is_https() && ! ! $tohttps = Config::get('to_https')) {
        // 检查是否为本地开发环境
        $host = $_SERVER['HTTP_HOST'];
        $is_local = (
            $host == 'localhost' || 
            $host == '127.0.0.1' || 
            strpos($host, 'localhost:') === 0 ||
            strpos($host, '127.0.0.1:') === 0 ||
            preg_match('/\.local$/i', $host) ||
            preg_match('/\.test$/i', $host)
        );
        
        // 仅在非本地环境时执行重定向
        if (!$is_local) {
            //header("Location: http://" . $_SERVER['HTTP_HOST'], true, 301);
            header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true,301);
        }
    }

    // 自动跳转主域名（跳过localhost和本地开发环境）
    if (! ($this->config('wap_domain') && is_mobile()) && (! ! $main_domain = Config::get('main_domain')) && (! ! $to_main_domain = Config::get('to_main_domain'))) {
        $current_host = get_http_host(true);
        
        // 检查是否为本地开发环境
        $is_local = (
            $current_host == 'localhost' || 
            $current_host == '127.0.0.1' || 
            strpos($current_host, 'localhost:') === 0 ||
            strpos($current_host, '127.0.0.1:') === 0 ||
            preg_match('/\.local$/i', $current_host) ||
            preg_match('/\.test$/i', $current_host)
        );
        
        // 仅在非本地环境且域名不匹配时执行重定向
        if (!$is_local && ! preg_match('{^' . $main_domain . '$}i', $current_host)) {
            if (is_https()) {
                header("Location: https://" . $main_domain . ':' . $_SERVER['SERVER_PORT'], true, 301);
            } else {
                header("Location: http://" . $main_domain . ':' . $_SERVER['SERVER_PORT'], true, 301);
            }
            exit();
        }
    }
    
    // ====== 修改结束 ======
    
    // IP访问黑白名单检测
    $user_ip = get_user_ip(); // 获取用户IP
    if (filter_var($user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        // ip黑名单
        $ip_deny = Config::get('ip_deny', true);
        foreach ($ip_deny as $key => $value) {
            if (network_match($user_ip, $value)) {
                error('本站启用了黑名单功能，您的IP(' . $user_ip . ')不允许访问！');
            }
        }
        // ip白名单
        $ip_allow = Config::get('ip_allow', true);
        foreach ($ip_allow as $key => $value) {
            if (network_match($user_ip, $value)) {
                $allow = true;
            }
        }
        
        // 如果设置了白名单，IP不在白名单内，则阻止访问
        if ($ip_allow && ! isset($allow)) {
            error('本站启用了白名单功能，您的IP(' . $user_ip . ')不在允许范围！');
        }
    }
    
    // 语言绑定域名检测， 如果匹配到多语言绑定则自动设置当前语言
    $lgs = Config::get('lgs');
    if (count($lgs) > 1) {
        $domain = get_http_host();
        foreach ($lgs as $value) {
            if ($value['domain'] == $domain) {
                cookie('lg', $value['acode']);
                break;
            }
        }
    }
    
    // 未设置语言时使用默认语言
    $black_lg = ['pboot','system'];
    if (!isset($_COOKIE['lg']) || in_array($_COOKIE['lg'],$black_lg)) {
        cookie('lg', get_default_lg());
    }
    
    // 手机自适应主题（跳过localhost和本地开发环境）
    if ($this->config('open_wap')) {
        $current_host = get_http_host();
        
        // 检查是否为本地开发环境
        $is_local = (
            $current_host == 'localhost' || 
            $current_host == '127.0.0.1' || 
            strpos($current_host, 'localhost:') === 0 ||
            strpos($current_host, '127.0.0.1:') === 0 ||
            preg_match('/\.local$/i', $current_host) ||
            preg_match('/\.test$/i', $current_host)
        );
        
        if ($this->config('wap_domain') && $this->config('wap_domain') == $current_host) {
            $this->setTheme(get_theme() . '/wap'); // 已绑域名并且一致则自动手机版本
        } elseif (!$is_local && is_mobile() && $this->config('wap_domain') && $this->config('wap_domain') != $current_host) {
            if (is_https()) {
                $pre = 'https://';
            } else {
                $pre = 'http://';
            }
            header('Location:' . $pre . $this->config('wap_domain') . URL, true, 302); // 手机访问并且绑定了域名，但是访问域名不一致则跳转
        } elseif (is_mobile() && ! $this->config('wap_domain')) {
            $this->setTheme(get_theme() . '/wap'); // 未绑定域名，但是手机访问则使用wap主题
        }
    }
    
    // 其他代码...
}
```

---

## 操作步骤

### 1. 备份原文件

```bash
# 在修改前备份原文件
copy Y_php\apps\common\HomeController.php Y_php\apps\common\HomeController.php.backup
```

### 2. 打开文件进行编辑

使用文本编辑器（如Notepad++、VSCode、Sublime Text等）打开：
```
Y_php\apps\common\HomeController.php
```

### 3. 定位到 `__construct()` 方法

在文件中找到 `public function __construct()` 方法。

### 4. 应用上述三处修改

按照上面的说明，修改三处代码。

### 5. 保存文件

保存修改后的文件。

### 6. 重启IIS

```bash
# 在命令提示符中执行（管理员权限）
iisreset
```

或者在IIS管理器中重启网站。

### 7. 清除浏览器缓存

按 `Ctrl+Shift+Delete` 清除浏览器缓存。

### 8. 测试

访问 `http://localhost`，应该不再跳转。

---

## 验证修改是否成功

### 测试清单

- [ ] 访问 `http://localhost` 不跳转
- [ ] 访问 `http://127.0.0.1` 不跳转
- [ ] 访问 `http://localhost:8080`（如果使用其他端口）不跳转
- [ ] 按 `Ctrl+F5` 强制刷新，仍然不跳转
- [ ] 生产环境的HTTPS跳转仍然正常工作（如果有）

---

## 支持的本地环境域名

修改后的代码会跳过以下域名的重定向：

- `localhost`
- `127.0.0.1`
- `localhost:任意端口`
- `127.0.0.1:任意端口`
- `*.local`（如 `mysite.local`）
- `*.test`（如 `mysite.test`）

如果您使用其他本地开发域名，可以在判断条件中添加：

```php
$is_local = (
    $host == 'localhost' || 
    $host == '127.0.0.1' || 
    strpos($host, 'localhost:') === 0 ||
    strpos($host, '127.0.0.1:') === 0 ||
    preg_match('/\.local$/i', $host) ||
    preg_match('/\.test$/i', $host) ||
    $host == 'mysite.dev' ||  // 添加自定义域名
    strpos($host, 'mysite.dev:') === 0  // 添加自定义域名带端口
);
```

---

## 升级系统时的注意事项

**重要提醒：** 升级PbootCMS时，`apps/common/HomeController.php` 文件会被覆盖。

**建议做法：**

1. **升级前备份修改的文件**
   ```bash
   copy Y_php\apps\common\HomeController.php Y_php\HomeController.php.custom
   ```

2. **升级系统**

3. **重新应用修改**
   - 使用文本比较工具（如Beyond Compare、WinMerge）比较备份文件和新文件
   - 将修改部分重新应用到新文件中

4. **或者使用方法一/方法二**
   - 方法一和方法二的配置保存在数据库中
   - 升级系统不会影响数据库配置
   - **强烈建议改用方法一或方法二！**

---

## 如果修改后出现错误

### PHP语法错误

如果修改后网站无法访问，显示空白页面或错误：

1. **恢复备份文件**
   ```bash
   copy Y_php\apps\common\HomeController.php.backup Y_php\apps\common\HomeController.php
   ```

2. **重启IIS**

3. **重新检查修改的代码**
   - 确保所有括号匹配
   - 确保没有多余的分号或逗号
   - 确保字符串引号正确闭合

### 仍然跳转

如果修改后仍然跳转：

1. **确认文件已保存**
2. **确认IIS已重启**
3. **清除浏览器缓存和HSTS**
   - 访问 `chrome://net-internals/#hsts`
   - 输入 `localhost`，点击 `Delete`
4. **检查是否修改了正确的文件**
   - 如果有多个网站，确保修改的是正确的文件

---

## 为什么不推荐方法三？

| 问题 | 说明 |
|------|------|
| **升级丢失** | 系统升级时修改会被覆盖 |
| **维护困难** | 每次升级都要重新修改 |
| **出错风险** | 代码错误可能导致网站无法访问 |
| **不符合原则** | 违反了"不修改源代码"的最佳实践 |

**推荐替代方案：**
- ✅ **方法一**：后台配置，简单安全
- ✅ **方法二**：修改数据库，不影响源代码

---

## 最终建议

虽然您要求使用方法三，但我**强烈建议考虑使用方法一或方法二**：

### 如果可以登录后台 → 使用方法一
- 最简单、最安全
- 不修改源代码
- 升级不影响

### 如果无法登录后台 → 使用方法二
- 修改数据库配置
- 不修改源代码
- 升级不影响

### 如果必须用方法三
- 请严格按照上述步骤操作
- 做好备份
- 升级前记得重新应用修改

---

## 总结

按照上述步骤修改 `apps/common/HomeController.php` 文件后：

✅ localhost访问不会跳转  
✅ 本地开发环境正常使用  
✅ 生产环境的重定向功能仍然正常  
⚠️ 升级系统时需要重新应用修改  

**修改文件的位置**：`Y_php/apps/common/HomeController.php`

**需要重启**：IIS服务

**需要清除**：浏览器缓存

---

如有问题，请参考 `修复配置指南.md` 中的其他方法。
