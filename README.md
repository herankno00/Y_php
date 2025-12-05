# Y_php

## Localhost劫持分析 - 已找到原因！

本仓库是一个**PbootCMS内容管理系统**，经过代码审查，**已确认导致localhost劫持的具体代码位置和原因**。

### 📄 文档索引

1. **[回答.md](./回答.md)** - 直接回答为什么localhost被劫持，包含具体代码位置（推荐先看这个）
2. **[代码分析报告.md](./代码分析报告.md)** - 完整的代码审查报告，包含所有发现的安全问题
3. **[LOCALHOST_HIJACKING_ANALYSIS.md](./LOCALHOST_HIJACKING_ANALYSIS.md)** - 通用的localhost劫持分析（参考）

### 🔍 快速结论

**localhost被劫持的确切原因：**

在 `apps/common/HomeController.php` 文件中发现三处强制重定向代码：

1. ⭐⭐⭐⭐⭐ **强制HTTPS重定向** (第32-35行)
   - 访问 `http://localhost` 被重定向到 `https://localhost`
   - 本地无SSL证书导致无法访问

2. ⭐⭐⭐⭐⭐ **强制主域名跳转** (第37-47行)
   - localhost被强制重定向到配置的主域名
   - 完全无法使用localhost

3. ⭐⭐⭐⭐ **手机域名自动跳转** (第92-101行)
   - 移动设备访问localhost被重定向到手机域名

### 🔧 快速修复

编辑配置文件或数据库，设置：

```php
'to_https' => 0,         // 关闭强制HTTPS
'to_main_domain' => 0,   // 关闭主域名跳转
```

或在 `apps/common/HomeController.php` 中添加本地环境检测。

### ⚠️ 其他发现的安全问题

- 数据库密码使用弱密码 `123456`
- 授权码暴露在配置文件中
- Base64解码重定向可能导致开放重定向漏洞
- 敏感目录需要Web服务器保护

### 📚 详细信息

请查看上面的文档获取：
- 具体代码位置和问题分析
- 详细的修复方案
- 安全配置建议
- 目录结构说明