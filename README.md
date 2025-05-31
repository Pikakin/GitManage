# GitManage

GitHub管理システム - GitHubリポジトリの作成・管理を簡単に行えるWebアプリケーション

## 概要

GitManageは、GitHubリポジトリの管理を効率化するためのWebベースのシステムです。直感的なインターフェースでリポジトリの作成、閲覧、管理が可能で、GitHubのIssue管理機能も搭載しています。

## 機能

- 🔐 ユーザーログイン・認証システム
- 🏠 ランディングページ
- 📊 ダッシュボード表示
- 📁 GitHubリポジトリの一覧表示・管理
- ➕ 新規リポジトリの作成
- 🐛 GitHub Issues の取得・表示
- 👤 アカウント情報の設定・管理
- 🌙 ダークモード対応
- 📱 レスポンシブデザイン

## 技術スタック

- **バックエンド**: PHP
- **データベース**: MySQL/MariaDB
- **フロントエンド**: HTML, CSS, JavaScript
- **API**: GitHub API
- **フォント**: Google Fonts (Rampart One, M PLUS Rounded 1c, Noto Sans JP)

## セットアップ

### 必要な環境

- PHP 7.4以上
- MySQL 5.7以上 または MariaDB 10.2以上
- Webサーバー (Apache/Nginx)
- GitHub Personal Access Token

### インストール手順

1. リポジトリをクローン
```bash
git clone https://github.com/Pikakin/GitManage.git
```

2. プロジェクトディレクトリに移動
```bash
cd GitManage
```

3. データベース設定
   - `app/database/connect.php`でデータベース接続情報を設定

4. GitHub API設定
   - GitHub Personal Access Tokenを取得
   - アプリケーション内でトークンを設定

5. Webサーバーの設定
   - DocumentRootをプロジェクトのルートディレクトリに設定

6. ブラウザでアクセス
   ```
   http://localhost/GitManage
   ```

## ディレクトリ構造

```
GitManage/
├── index.php                           # メインエントリーポイント
├── app/
│   ├── database/
│   │   └── connect.php                 # データベース接続設定
│   ├── functions/
│   │   ├── checkInputedValue.php       # 入力値検証
│   │   ├── getIssues.php              # GitHub Issues取得
│   │   ├── getRepositories.php        # リポジトリ情報取得
│   │   ├── isAccountInfoSet.php       # アカウント情報確認
│   │   ├── Login.php                  # ログイン処理
│   │   └── SetAccountSESSION.php      # セッション管理
│   └── parts/
│       ├── createRepo.php             # リポジトリ作成画面
│       ├── dashboard.php              # ダッシュボード
│       ├── header.php                 # ヘッダーコンポーネント
│       ├── Landing_Page.php           # ランディングページ
│       ├── left-content.php           # 左サイドコンテンツ
│       ├── Loading.php                # ローディング画面
│       ├── LoginForm.php              # ログインフォーム
│       ├── main-content.php           # メインコンテンツ
│       ├── PrintValueError.php        # エラー表示
│       ├── right-content.php          # 右サイドコンテンツ
│       ├── sidebar.php                # サイドバー
│       └── table.php                  # テーブル表示
└── assets/
    ├── moon.png                       # ダークモードアイコン
    ├── sun.png                        # ライトモードアイコン
    ├── style.css                      # メインスタイルシート
    └── Lading_Page/
        ├── image.jpg                  # ランディングページ画像
        └── LPstyle.css               # ランディングページ専用CSS
```

## 使用方法

### 1. 初回セットアップ
- アプリケーションにアクセスするとランディングページが表示されます
- アカウント情報を設定してGitHubアカウントと連携します

### 2. ダッシュボード
- ログイン後、メインダッシュボードでリポジトリの概要を確認できます
- サイドバーから各機能にアクセス可能です

### 3. リポジトリ管理
- 既存のGitHubリポジトリを一覧表示
- リポジトリの詳細情報を確認
- 新しいリポジトリの作成

### 4. Issue管理
- GitHubのIssueを取得・表示
- Issue の詳細確認

### 5. テーマ切り替え
- ヘッダーの月/太陽アイコンでダークモード/ライトモードを切り替え

## 主要機能

### GitHub API連携
- リポジトリ情報の取得
- Issue情報の取得
- 新規リポジトリの作成

### ユーザー管理
- セッション管理
- アカウント情報の永続化
- 入力値の検証

### UI/UX
- レスポンシブデザイン
- ダークモード対応
- ローディング画面
- エラーハンドリング

## 設定

### GitHub Personal Access Token
1. GitHub Settings → Developer settings → Personal access tokens
2. 必要な権限を設定:
   - `repo` (リポジトリアクセス)
   - `read:user` (ユーザー情報読み取り)
3. 生成されたトークンをアプリケーションに設定

## トラブルシューティング

### よくある問題
- **GitHub API制限**: レート制限に達した場合は時間をおいて再試行
- **データベース接続エラー**: `connect.php`の設定を確認
- **権限エラー**: GitHub tokenの権限設定を確認

## 貢献

1. このリポジトリをフォーク
2. 機能ブランチを作成 (`git checkout -b feature/AmazingFeature`)
3. 変更をコミット (`git commit -m 'Add some AmazingFeature'`)
4. ブランチにプッシュ (`git push origin feature/AmazingFeature`)
5. プルリクエストを作成

## ライセンス

このプロジェクトのライセンス情報については、LICENSEファイルを参照してください。

## 作者

[@Pikakin](https://github.com/Pikakin)

## サポート

問題や質問がある場合は、[Issues](https://github.com/Pikakin/GitManage/issues)で報告してください。

---

**注意**: このアプリケーションを使用する前に、GitHub Personal Access Tokenの適切な管理とセキュリティ対策を確実に行ってください。
