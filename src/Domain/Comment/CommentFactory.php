<?php

declare(strict_types=1);

namespace App\Domain\Comment;

use App\Domain\Auth\AuthInterface;
use App\Domain\Post\Rating\Rating;
use App\Domain\Post\Rating\RatingFactory;
use DateTime;
use Ramsey\Uuid\Uuid;
use WalkWeb\NW\AppException;
use WalkWeb\NW\Traits\ValidationTrait;

class CommentFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return CommentInterface
     * @throws AppException
     */
    public static function create(array $data): CommentInterface
    {
        $authorName = self::stringOrNull($data, 'author_name', CommentException::INVALID_AUTHOR_NAME);

        if ($authorName === null) {
            $authorName = self::string($data, 'guest_name', CommentException::INVALID_GUEST_NAME);
        }

        $authorAvatar = self::stringOrNull($data, 'author_avatar', CommentException::INVALID_AUTHOR_AVATAR);

        if ($authorAvatar === null) {
            $authorAvatar = CommentInterface::DEFAULT_AVATAR;
        }

        $authorLevel = self::intOrNull($data, 'author_level', CommentException::INVALID_AUTHOR_LEVEL);

        if ($authorLevel === null) {
            $authorLevel = 0;
        }

        return new Comment(
            self::uuid($data, 'id', CommentException::INVALID_ID),
            self::uuid($data, 'post_id', CommentException::INVALID_POST_ID),
            self::uuidOrNull($data, 'author_id', CommentException::INVALID_AUTHOR_ID),
            $authorName,
            $authorAvatar,
            $authorLevel,
            self::string($data, 'message', CommentException::INVALID_MESSAGE),
            (bool)self::int($data, 'approved', CommentException::INVALID_APPROVED),
            self::uuidOrNull($data, 'parent_id', CommentException::INVALID_PARENT_ID),
            self::int($data, 'level', CommentException::INVALID_LEVEL),
            RatingFactory::create($data),
            self::date($data, 'created_at', CommentException::INVALID_CREATED_AT),
            self::date($data, 'updated_at', CommentException::INVALID_UPDATED_AT),
        );
    }

    /**
     * @param string $postId
     * @param string $message
     * @param AuthInterface|null $user
     * @param string|null $parentId
     * @param int $level
     * @param string $guestName
     * @return Comment
     * @throws AppException
     */
    public static function createNew(
        string $postId,
        string $message,
        ?AuthInterface $user = null,
        ?string $parentId = null,
        int $level = 0,
        string $guestName = ''
    ): Comment
    {
        if ($user === null && $guestName === '') {
            throw new AppException(CommentException::NO_USER_AND_GUEST_NAME);
        }

        // TODO if parent_id !== null && level === 0 => error

        return new Comment(
            Uuid::uuid4()->toString(),
            $postId,
            $user ? $user->getId() : null,
            $user ? $user->getName() : $guestName,
            $user ? $user->getAvatar() : Comment::DEFAULT_AVATAR,
            $user ? $user->getLevel()->getLevel() : 0,
            $message,
            false,
            $parentId,
            $level,
            new Rating(0, 0, 0),
            new DateTime(),
            new DateTime(),
        );
    }
}
