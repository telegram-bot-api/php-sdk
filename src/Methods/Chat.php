<?php

namespace Telegram\Bot\Methods;

use stdClass;
use Telegram\Bot\Traits\Http;

/**
 * Class Chat.
 *
 * @mixin Http
 */
trait Chat
{
    /**
     * Ban a user in a group, a supergroup or a channel
     *
     * In the case of supergroups, the user will not be able to return to the group on their own using
     * invite links etc., unless unbanned first.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * Note: This will method only work if the ‘All Members Are Admins’ setting is off in the target group.
     * Otherwise members may only be removed by the group's creator or by the member that added them.
     *
     * <code>
     * $params = [
     *      'chat_id'         => '',  // int|string - Required. Unique identifier for the target group or username of the target supergroup (in the format "@supergroupusername")
     *      'user_id'         => '',  // int        - Required. Unique identifier of the target user.
     *      'until_date'      => '',  // int        - (Optional). Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
     *      'revoke_messages' => '',  // bool       - (Optional). Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#banchatmember
     */
    public function banChatMember(array $params): bool
    {
        return $this->get('banChatMember', $params)->getResult();
    }

    /**
     * Export an invite link to a supergroup or a channel.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#exportchatinvitelink
     */
    public function exportChatInviteLink(array $params): string
    {
        return $this->post('exportChatInviteLink', $params)->getResult();
    }

    /**
     * Create an additional invite link for a chat
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'               => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *      'name'                  => '',  // string     - (Optional).	Invite link name; 0-32 characters
     *      'expire_date'           => '',  // int        - (Optional). Point in time (Unix timestamp) when the link will expire
     *      'member_limit'          => '',  // int        - (Optional). Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     *      'creates_join_request'  => '',  // bool       - (Optional). True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#createchatinvitelink
     */
    public function createChatInviteLink(array $params): stdClass
    {
        return $this->post('createChatInviteLink', $params)->getResult();
    }

    /**
     * Edit a non-primary invite link created by the bot.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'               => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *      'invite_link'           => '',  // string     - Required. The invite link to edit
     *      'name'                  => '',  // string     - (Optional).	Invite link name; 0-32 characters
     *      'expire_date'           => '',  // int        - (Optional). Point in time (Unix timestamp) when the link will expire
     *      'member_limit'          => '',  // int        - (Optional). Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     *      'creates_join_request'  => '',  // bool       - (Optional). True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#editchatinvitelink
     */
    public function editChatInviteLink(array $params): stdClass
    {
        return $this->post('editChatInviteLink', $params)->getResult();
    }

    /**
     * Revoke an invite link created by the bot.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'               => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *      'invite_link'           => '',  // string     - Required. The invite link to revoke
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#revokechatinvitelink
     */
    public function revokeChatInviteLink(array $params): stdClass
    {
        return $this->post('revokeChatInviteLink', $params)->getResult();
    }

    /**
     * Approve a chat join request
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'       => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *      'user_id'       => '',  // int        - Required. Unique identifier of the target user
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#approvechatjoinrequest
     */
    public function approveChatJoinRequest(array $params): bool
    {
        return $this->post('approveChatJoinRequest', $params)->getResult();
    }

    /**
     * Decline a chat join request
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'       => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *      'user_id'       => '',  // int        - Required. Unique identifier of the target user
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#declinechatjoinrequest
     */
    public function declineChatJoinRequest(array $params): bool
    {
        return $this->post('declineChatJoinRequest', $params)->getResult();
    }

    /**
     * Set a new profile photo for the chat.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',                     // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *      'photo'    => InputFile::file($file), // InputFile  - Required. New chat photo, uploaded using multipart/form-data
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#setchatphoto
     */
    public function setChatPhoto(array $params): bool
    {
        return $this->uploadFile('setChatPhoto', $params)->getResult();
    }

    /**
     * Delete a chat photo.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#deletechatphoto
     */
    public function deleteChatPhoto(array $params): bool
    {
        return $this->post('deleteChatPhoto', $params)->getResult();
    }

    /**
     * Set the title of a chat.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *      'title'    => '',  // string     - Required. New chat title, 1-255 characters
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#setchattitle
     */
    public function setChatTitle(array $params): bool
    {
        return $this->post('setChatTitle', $params)->getResult();
    }

    /**
     * Set the description of a supergroup or a channel.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'      => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *      'description'  => '',  // string     - (Optional). New chat description, 0 - 255 characters.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#setchatdescription
     */
    public function setChatDescription(array $params): bool
    {
        return $this->post('setChatDescription', $params)->getResult();
    }

    /**
     * Pin a message in a group, a supergroup, or a channel.
     *
     * The bot must be an administrator in the chat for this to work and must have the ‘can_pin_messages’ admin right in the supergroup
     * or ‘can_edit_messages’ admin right in the channel.
     *
     * <code>
     * $params = [
     *      'chat_id'               => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *      'message_id'            => '',  // int        - Required. Identifier of a message to pin
     *      'disable_notification'  => '',  // bool       - (Optional). Pass True, if it is not necessary to send a notification to all group members about the new pinned message
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#pinchatmessage
     */
    public function pinChatMessage(array $params): bool
    {
        return $this->post('pinChatMessage', $params)->getResult();
    }

    /**
     * Unpin a message in a group, a supergroup, or a channel.
     *
     * The bot must be an administrator in the chat for this to work and must have the ‘can_pin_messages’ admin right in the supergroup
     * or ‘can_edit_messages’ admin right in the channel.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'     => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *      'message_id'  => '',  // int        - (Optional). Identifier of a message to unpin. If not specified, the most recent pinned message (by sending date) will be unpinned.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#unpinchatmessage
     */
    public function unpinChatMessage(array $params): bool
    {
        return $this->post('unpinChatMessage', $params)->getResult();
    }

    /**
     * Unpin/clear the list of pinned messages in a chat.
     *
     * If the chat is not a private chat, the bot must be an administrator in the chat for this to work
     * and must have the 'can_pin_messages' admin right in a supergroup or 'can_edit_messages' admin right
     * in a channel.
     *
     * <code>
     * $params = [
     *      'chat_id'     => '',  // string|int - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#unpinallchatmessages
     */
    public function unpinAllChatMessages(array $params): bool
    {
        return $this->post('unpinAllChatMessages', $params)->getResult();
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Unique identifier for the target chat or username of the target supergroup or channel (in the format "@channelusername")
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#leavechat
     */
    public function leaveChat(array $params): bool
    {
        return $this->get('leaveChat', $params)->getResult();
    }

    /**
     * Unban a previously kicked user in a supergroup.
     *
     * The user will not return to the group automatically, but will be able to join via link, etc.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'        => '',  // int|string - Unique identifier for the target group or username of the target supergroup (in the format "@supergroupusername")
     *      'user_id'        => '',  // int        - Unique identifier of the target user.
     *      'only_if_banned' => '',  // bool       - (Optional). Do nothing if the user is not banned
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#unbanchatmember
     */
    public function unbanChatMember(array $params): bool
    {
        return $this->get('unbanChatMember', $params)->getResult();
    }

    /**
     * Restrict a user in a supergroup.
     *
     * Pass True for all boolean parameters to lift restrictions from a user.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'      => '',  // int|string      - Required. Unique identifier for the target group or username of the target supergroup (in the format "@supergroupusername")
     *      'user_id'      => '',  // int             - Required. Unique identifier of the target user.
     *      'permissions'  => '',  // ChatPermissions - Required.  New user permissions
     *      'until_date'   => '',  // int             - (Optional). Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#restrictchatmember
     */
    public function restrictChatMember(array $params): bool
    {
        return $this->post('restrictChatMember', $params)->getResult();
    }

    /**
     * Promote or demote a user in a supergroup or a channel.
     *
     * Pass False for all boolean parameters to demote a user.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'               => '',  // int|string - Required. Unique identifier for the target group or username of the target supergroup (in the format "@supergroupusername")
     *      'user_id'               => '',  // int        - Required. Unique identifier of the target user.
     *      'is_anonymous'          => '',  // bool       - (Optional). Pass True, if the administrator's presence in the chat is hidden
     *      'can_manage_chat    '   => '',  // bool       - (Optional). Pass True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
     *      'can_change_info'       => '',  // bool       - (Optional). Pass True, if the administrator can change chat title, photo and other settings
     *      'can_post_messages'     => '',  // bool       - (Optional). Pass True, if the administrator can create channel posts, channels only
     *      'can_edit_messages'     => '',  // bool       - (Optional). Pass True, if the administrator can edit messages of other users, channels only
     *      'can_delete_messages'   => '',  // bool       - (Optional). Pass True, if the administrator can delete messages of other users
     *      'can_invite_users'      => '',  // bool       - (Optional). Pass True, if the administrator can invite new users to the chat
     *      'can_manage_voice_chats'=> '',  // bool       - (Optional). Pass True, if the administrator can manage voice chats
     *      'can_restrict_members'  => '',  // bool       - (Optional). Pass True, if the administrator can restrict, ban or unban chat members
     *      'can_pin_messages'      => '',  // bool       - (Optional). Pass True, if the administrator can pin messages, supergroups only
     *      'can_promote_members'   => '',  // bool       - (Optional). Pass True, if the administrator can add new administrators with a subset of his own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by him)
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#restrictchatmember
     */
    public function promoteChatMember(array $params): bool
    {
        return $this->post('promoteChatMember', $params)->getResult();
    }

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot.
     *
     * Returns True on success.
     *
     * <code>
     * $params = [
     *      'chat_id'       => '',  // int|string - Required. Unique identifier for the target chat or username of the target supergroup (in the format "@supergroupusername")
     *      'user_id'       => '',  // int        - Required. Unique identifier of the target user
     *      'custom_title'  => '',  // string     - Required. New custom title for the administrator; 0                                                                      - 16 characters, emoji are not allowed
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     */
    public function setChatAdministratorCustomTitle(array $params): bool
    {
        return $this->post('setChatAdministratorCustomTitle', $params)->getResult();
    }

    /**
     * Ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat
     * won't be able to send messages on behalf of any of their channels.
     *
     * Returns True on success.
     *
     * <code>
     * $params = [
     *      'chat_id'         => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *      'sender_chat_id'  => '',  // int        - Required. Unique identifier of the target sender chat
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#banchatsenderchat
     */
    public function banChatSenderChat(array $params): bool
    {
        return $this->post('banChatSenderChat', $params)->getResult();
    }

    /**
     * Unban a previously banned channel chat in a supergroup or channel.
     *
     * The bot must be an administrator for this to work
     *
     * Returns True on success.
     *
     * <code>
     * $params = [
     *      'chat_id'         => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *      'sender_chat_id'  => '',  // int        - Required. Unique identifier of the target sender chat
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#unbanchatsenderchat
     */
    public function unbanChatSenderChat(array $params): bool
    {
        return $this->post('unbanChatSenderChat', $params)->getResult();
    }

    /**
     * Use this method to set default chat permissions for all members.
     * The bot must be an administrator in the group or a supergroup for this to work and
     * must have the can_restrict_members admin rights.
     *
     * <code>
     * $params = [
     *      'chat_id'      => '',  // int|string      - Required. Unique identifier for the target group or username of the target supergroup (in the format "@supergroupusername")
     *      'permissions'  => '',  // ChatPermissions - Required. New default chat permissions
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#setchatpermissions
     */
    public function setChatPermissions(array $params): bool
    {
        return $this->post('setChatPermissions', $params)->getResult();
    }

    /**
     * Get up to date information about the chat (current name of the user for one-on-one conversations,
     * current username of a user, group or channel, etc.).
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Unique identifier for the target chat or username of the target supergroup or channel (in the format "@channelusername")
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#getchat
     */
    public function getChat(array $params): stdClass
    {
        return $this->get('getChat', $params)->getResult();
    }

    /**
     * Get a list of administrators in a chat.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Unique identifier for the target chat or username of the target supergroup or channel (in the format "@channelusername");
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#getchatadministrators
     *
     * @return stdClass[]
     */
    public function getChatAdministrators(array $params): array
    {
        return $this->get('getChatAdministrators', $params)->getResult();
    }

    /**
     * Get the number of members in a chat.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Unique identifier for the target chat or username of the target supergroup or channel (in the format "@channelusername").
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#getchatmembercount
     */
    public function getChatMemberCount(array $params): int
    {
        return $this->get('getChatMemberCount', $params)->getResult();
    }

    /**
     * Get information about a member of a chat.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Unique identifier for the target chat or username of the target supergroup or channel (in the format "@channelusername").
     *      'user_id'  => '',  // int        - Unique identifier of the target user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#getchatmember
     *
     */
    public function getChatMember(array $params)
    {
        return $this->get('getChatMember', $params)->getResult();
    }

    /**
     * Set a new group sticker set for a supergroup.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'           => '',  // string|int - Required. Unique identifier for the target chat or username of the target supergroup (in the format "@supergroupusername")
     *      'sticker_set_name'  => '',  // int        - Required. Name of the sticker set to be set as the group sticker set
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#setchatstickerset
     */
    public function setChatStickerSet(array $params): bool
    {
        return $this->post('setChatStickerSet', $params)->getResult();
    }

    /**
     * Delete a group sticker set from a supergroup.
     *
     * The bot must be an administrator in the group for this to work.
     *
     * <code>
     * $params = [
     *      'chat_id'  => '',  // string|int - Required. Unique identifier for the target chat or username of the target supergroup (in the format "@supergroupusername")
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#deletechatstickerset
     */
    public function deleteChatStickerSet(array $params): bool
    {
        return $this->post('deleteChatStickerSet', $params)->getResult();
    }
}
