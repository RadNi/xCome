import unittest
from selenium import webdriver
from test_utility import fields, static_data


# assuming captcha is 1234

class AddClerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_miss_match_captcha(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "income=100",
                                               "address=21st number baker st.", "captcha=1134", "add"])[11].click()
        assert driver.find_element_by_id("inValid") is None

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
