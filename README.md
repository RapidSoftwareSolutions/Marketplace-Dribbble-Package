[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Dribbble/functions?utm_source=RapidAPIGitHub_DribbbleFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)


# Dribbble Package
Dribbble - Show and tell for designers
* Domain: [dribbble.com](https://dribbble.com)
* Credentials: clientId, clientSecret, code, accessToken

## How to get credentials: 
1. Sign in [dribbble.com](https://dribbble.com).
2. Register new [application](https://dribbble.com/account/applications/new)
3. Receive code on this endpoint:
```
https://dribbble.com/oauth/authorize
```
Parameters:
```
client_id - The client ID you received from Dribbble when you registered.
redirect_uri - The URL in your application where users will be sent after authorization.
scope - A space separated list of scopes.
state - An unguessable random string. It is used to protect against cross-site request forgery attacks.
```
4. Call ```getAccessToken``` block.
## Custom datatypes:
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]```
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```


## Dribbble.getAccessToken
Returns access token.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| The client ID you received from Dribbble when you registered.
| clientSecret| credentials| The client secret you received from Dribbble when you registered.
| code        | credentials| The OAuth verification code acquired via OAuth's web authentication protocol.
| redirectUri | String     | The URL in your application where users will be sent after authorization.

## Dribbble.getSingleBucket
Get a bucket.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Bucket id

## Dribbble.createBucket
Creating a bucket requires the user to be authenticated with the write scope.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| name       | String     | The name of the bucket.
| description| String     | A description of the bucket.

## Dribbble.updateBucket
Updating a bucket requires the user to be authenticated with the write scope. The authenticated user must also own the bucket.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Bucket id
| name       | String     | The name of the bucket.
| description| String     | A description of the bucket.

## Dribbble.deleteBucket
Deleting a bucket requires the user to be authenticated with the write scope. The authenticated user must also own the bucket.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Bucket id

## Dribbble.getBucketShots
List shots for a bucket.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Bucket id

## Dribbble.addShotToBucket
Adding a shot to a bucket requires the user to be authenticated with the write scope. The authenticated user must also own the bucket.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Bucket id
| shotId     | Number     | The ID of the shot to add.

## Dribbble.removeShotFromBucket
Removing a shot to a bucket requires the user to be authenticated with the write scope. The authenticated user must also own the bucket.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Bucket id
| shotId     | Number     | The ID of the shot to remove.

## Dribbble.getSingleProject
Get a project.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Project id

## Dribbble.getProjectShots
List shots for a project.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Project id

## Dribbble.getShots
List shots.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| list       | Select     | Limit the results to a specific type with the following possible values: animated, attachments, debuts, playoffs, rebounds, teams
| timeframe  | Select     | A period of time to limit the results to with the following possible values: week, month, year, ever
| date       | DatePicker | Limit the timeframe to a specific date, week, month, or year.
| sort       | Select     | The sort field with the following possible values: comments, recent, views

## Dribbble.getSingleShot
Get a shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.createShot
Creating a shot requires the user to be authenticated with the upload scope. The authenticated user must also be a player or team.

| Field          | Type       | Description
|----------------|------------|----------
| accessToken    | credentials| You dribbble access token
| title          | String     | The title of the shot.
| image          | File       | The image file. It must be exactly 400x300 or 800x600, no larger than eight megabytes, and be a GIF, JPG, or PNG.
| description    | String     | A description of the shot.
| tags           | List       | Tags for the shot.
| teamId         | String     | An ID of a team to associate the shot with. The authenticated user must either be a member of the team or be authenticated as the same team.
| reboundSourceId| Number     | An ID of a shot that the new shot is a rebound of. The shot must be reboundable and by a user not blocking the authenticated user.
| lowProfile     | Boolean    | Specify true if the shot is Low Profile.

## Dribbble.updateShot
Updating a shot requires the user to be authenticated with the upload scope. The authenticated user must also own the shot.

| Field          | Type       | Description
|----------------|------------|----------
| accessToken    | credentials| You dribbble access token
| id             | String     | Shot id
| title          | String     | The title of the shot.
| image          | File       | The image file. It must be exactly 400x300 or 800x600, no larger than eight megabytes, and be a GIF, JPG, or PNG.
| description    | String     | A description of the shot.
| tags           | List       | Tags for the shot.
| teamId         | String     | An ID of a team to associate the shot with. The authenticated user must either be a member of the team or be authenticated as the same team.
| reboundSourceId| Number     | An ID of a shot that the new shot is a rebound of. The shot must be reboundable and by a user not blocking the authenticated user.
| lowProfile     | Boolean    | Specify true if the shot is Low Profile.

## Dribbble.deleteShot
Deleting a shot requires the user to be authenticated with the upload scope. The authenticated user must also own the shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.getShotAttachments
List attachments for a shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.createAttachment
Creating an attachment requires the user to be authenticated with the upload scope. The authenticated user must own the shot and be a pro, a team, or a member of a team.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| file       | File       | The attachment file. It must be no larger than 10 megabytes.

## Dribbble.getSingleAttachment
Get a single attachment.

| Field       | Type       | Description
|-------------|------------|----------
| accessToken | credentials| You dribbble access token
| id          | String     | Shot id
| attachmentId| String     | Attachment id

## Dribbble.deleteAttachment
Deleting an attachment requires the user to be authenticated with the upload scope. The authenticated user must also own the attachment.

| Field       | Type       | Description
|-------------|------------|----------
| accessToken | credentials| You dribbble access token
| id          | String     | Shot id
| attachmentId| String     | Attachment id

## Dribbble.getShotBuckets
List buckets for a shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.getShotComments
List comments for a shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.getCommentLikes
List likes for a comment.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| commentId  | String     | Comment id

## Dribbble.createComment
Creating a comment requires the user to be authenticated with the comment scope. The authenticated user must also be a player or team.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| body       | String     | The contents of the comment.

## Dribbble.getSingleComment
Get a single comment.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| commentId  | String     | Comment id

## Dribbble.updateComment
Updating a comment requires the user to be authenticated with the comment scope. The authenticated user must also own the comment.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| commentId  | String     | Comment id
| body       | String     | The contents of the comment.

## Dribbble.deleteComment
Deleting a comment requires the user to be authenticated with the comment scope. The authenticated user must also own the comment.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| commentId  | String     | Comment id

## Dribbble.checkYouLikeComment
Checking for a comment like requires the user to be authenticated.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| commentId  | String     | Comment id

## Dribbble.likeComment
Liking a comment requires the user to be authenticated with the write scope.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| commentId  | String     | Comment id

## Dribbble.unlikeComment
Unliking a comment requires the user to be authenticated with the write scope.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id
| commentId  | String     | Comment id

## Dribbble.getShotLikes
List the likes for a shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.checkYouLikeShot
Checking for a shot like requires the user to be authenticated.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.likeShot
Liking a shot requires the user to be authenticated with the write scope.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.unlikeShot
Unliking a shot requires the user to be authenticated with the write scope.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.getShotProjects
List projects for a shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.getShotRebounds
List rebounds for a shot.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Shot id

## Dribbble.getTeamMembers
List a team’s members.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Team id

## Dribbble.getTeamShots
List shots by the team and team members.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | Team id

## Dribbble.getSingleUser
Get a single user.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getUserBuckets
List a user’s buckets.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getUserFollowers
List a user’s followers.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getUsersFollowedByUser
List who a user is following.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getShotsForUsersFollowedByUser
Listing shots from followed users requires the user to be authenticated with the public scope. Also note that you can not retrieve more than 600 results, regardless of the number requested per page.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token

## Dribbble.checkYouFollowingUser
Check if you are following a user.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.checkOneUserFollowingAnother
Check if one user is following another.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id
| targetUser | String     | User id

## Dribbble.followUser
Following a user requires the user to be authenticated with the write scope.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.unfollowUser
Unfollowing a user requires the user to be authenticated with the write scope.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getShotLikesForUser
List shot likes for a user.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getUserProjects
List a user’s projects.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getUserShots
List a user’s shots.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.getUserTeams
List a user’s teams.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| id         | String     | User id

## Dribbble.createJob
Create a job.

| Field           | Type       | Description
|-----------------|------------|----------
| accessToken     | credentials| You dribbble access token
| organizationName| String     | The name of the organization the position is with.
| title           | String     | The title of the job position.
| location        | String     | The physical location of the position (e.g. “Boston” or “Anywhere”).
| url             | String     | An absolute URL to the full details of the job listing.
| active          | String     | true if you want the job to be published immediately.
| team            | String     | The integer id or string login of the team that you want associated with the job.

## Dribbble.updateJob
Update a job.

| Field           | Type       | Description
|-----------------|------------|----------
| accessToken     | credentials| You dribbble access token
| jobId           | String     | Id of the updated job.
| organizationName| String     | The name of the organization the position is with.
| title           | String     | The title of the job position.
| location        | String     | The physical location of the position (e.g. “Boston” or “Anywhere”).
| url             | String     | An absolute URL to the full details of the job listing.
| active          | String     | true if you want the job to be published immediately.
| team            | String     | The integer id or string login of the team that you want associated with the job.

## Dribbble.getSingleJob
Show a job.

| Field      | Type       | Description
|------------|------------|----------
| accessToken| credentials| You dribbble access token
| jobId      | String     | Id of the updated job.

