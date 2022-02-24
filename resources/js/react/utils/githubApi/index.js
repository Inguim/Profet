export const getUser = async (user) => {
  var info = {};
  await fetch(`https://api.github.com/users/${user}`)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      info = data;
    });

    return {
      username: info.name,
      bio: info.bio,
      location: info.location,
      git: info.html_url,
      cover_url: info.avatar_url
    };
};
