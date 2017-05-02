using System;
using System.Data.Common;
using Microsoft.Data.Sqlite;

namespace SqliteBlogTest
{
    public class SampleBlogDataFixture : IDisposable
    {
        private const string PostsTable =
            @"CREATE TABLE Posts(
                Id INTEGER PRIMARY KEY,
                IsPublished BOOLEAN NOT NULL,
                PublishDate DATETIME,
                Title VARCHAR(255) NOT NULL,
                PermalinkTitle VARCHAR(500) NOT NULL,
                Description TEXT,
                ContentUri VARCHAR(500) NOT NULL,
                ContentType VARCHAR(500) NOT NULL
                );";

        private const string TagsTable =
        @"CREATE TABLE Tags(
                Id INTEGER PRIMARY KEY,
                TagName VARCHAR(100) NOT NULL
            );";

        private const string PostTagsTable =
            @"CREATE TABLE PostTags(
                PostId INTEGER NOT NULL,
                TagId  INTEGER NOT NULL,
                FOREIGN KEY (PostId) REFERENCES Posts(Id),
                FOREIGN KEY (TagId) REFERENCES Tags(Id)
            );";

        public DbConnection Connection { get; private set;}



        public void Dispose()
        {
            if (Connection != null)
                Connection.Dispose();
        }
    }
}
