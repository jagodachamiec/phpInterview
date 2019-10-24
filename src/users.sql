SELECT system_user.name
FROM system_user INNER JOIN system_user_has_attribute
ON system_user.system_user_id = system_user_has_attribute.system_user_id
GROUP BY system_user.system_user_id
HAVING COUNT(system_user_has_attribute.attribute_id) = 3;